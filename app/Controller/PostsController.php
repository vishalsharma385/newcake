<?php

class PostsController extends AppController{
    public $helpers = array('Form', 'Html');
    public $components = array('Session'); 
    public $uses = array('Post');

    public function beforeFilter(){
        $this->Auth->allow('index');
    }


    public function index(){
        $this->loadModel('Post');
        $this->loadModel('User');

        $users = $this->User->find('all', [
            'contain' => ['Post']
        ]);

        $userPostCounts = [];
        foreach ($users as $user) {
            $userPostCounts[] = [
                'User' => $user['User'],
                'PostCount' => count($user['Post'])
            ];
        }

        // Set the data to the view
        $this->set('userPostCounts', $userPostCounts);

        $this->set('title', 'Posts Index');
        $data = $this->Post->find('all');
        $this->set('posts', $data);

    }

 
    public function view($id = null) {
        // Load the required models
        $this->loadModel('Post');
        $this->loadModel('User');
        $this->loadModel('Comment');
        $this->loadModel('Topic');
    
        // Fetch the post data by ID
        $this->Post->recursive = -1;
        $data = $this->Post->findById($id);
        
        // If the post doesn't exist, throw an exception
        if (!$data) {
            throw new NotFoundException(__('Invalid post'));
        }
    
        // Set the fetched post data to the view
        $this->set('posts', $data);
        $this->Comment->recursive = -1;
        $comments = $this->Comment->find('all', array(
            'conditions' => array('Comment.postid' => $id),
            'contain' => array('User')
        ));
        $this->set('comments', $comments);
        
    
        // Handle comment submission
        if ($this->request->is('post') && !empty($this->request->data)) {
            $comment = $this->request->data;
            $comment['Comment']['postid'] = $id; // Associate the comment with the post ID
           // $comment['Comment']['postid'] = $this->Auth->user('id'); // Associate the comment with the logged-in user
    
            // Save the comment data
            if ($this->Comment->save($comment)) {
                $this->Session->setFlash(__('Your comment has been saved.'));
                return $this->redirect(array('action' => 'view', $id));
            } else {
                $this->Session->error(__('Unable to add your comment.'));
            }
        }
       
    }
    
    
 
        
    public function add() {
        $this->set('title', 'Create Post');
        $data=$this->request->data;
        $this->Post->recursive = -1;
        $this->loadModel('Post');
      //  $aa=$this->Post->find('all');
        if (!empty($this->request->data['Post']['image']['name'])) {
            // pr($data);
            // exit;
            $file = $this->request->data['Post']['image'];
            unset($data['Post']['image']);
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
            $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
            
            if (in_array($ext, $allowedExtensions)) {
                $fileName = uniqid() . '.' . $ext;
                $uploadPath = WWW_ROOT . 'img/uploads/' . $fileName;
                
                if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                    unset($this->Post->data['Post']['image']);
                    $data['Post']['image'] = 'img/uploads/' . $fileName;
                } else {
                    $this->Session->setFlash(__('The image could not be uploaded. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('Invalid file type. Please upload an image with jpg, jpeg, png, or gif extension.'));
            }
        }
       
        if ($this->request->is('post')) {
            if ($this->Post->save($data['Post'])) {
                $this->Session->setFlash(__('The Post has been saved.'), 'default', array('class' => 'success'));
                return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Unable to save the post.'), 'default', array('class' => 'error'));
            }
        }
        $this->set('topics', $this->Post->Topic->find('list'));
    }

    // public function edit($id){
    //     $data = $this->Post->findById($id);
    //     if($this->request->is(array('post','put'))){
    //         $this->Post->id = $id;
    //         if($this->Post->save($this->request->data)){
    //             $this->Session->setFlash('The Post has been edited!');
    //             $this->redirect('index');
    //         }
    //     }
    //     $this->request->data = $data;
    // }
    public function edit($id = null) {
        $this->set('title', 'Edit Post');
        $this->Post->recursive = -1;
        $this->loadModel('Post');
    
        // Ensure the post exists
        if (!$id || !$post = $this->Post->findById($id)) {
            $this->Session->setFlash(__('Invalid Post.'));
            return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
        }
    
        // If the request is a PUT (edit) request
        if ($this->request->is(array('post', 'put'))) {
            $data = $this->request->data;
    
            // Check if an image was uploaded
            if (!empty($this->request->data['Post']['image']['name'])) {
                $file = $this->request->data['Post']['image'];
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
                
                // Validate the file extension
                if (in_array($ext, $allowedExtensions)) {
                    $fileName = uniqid() . '.' . $ext;
                    $uploadPath = WWW_ROOT . 'img/uploads/' . $fileName;
    
                    // Attempt to move the uploaded file to the upload directory
                    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                        // Set the image path in the request data
                        $data['Post']['image'] = 'img/uploads/' . $fileName;
    
                        // Optionally delete the old image file if needed
                        if (!empty($post['Post']['image']) && file_exists(WWW_ROOT . $post['Post']['image'])) {
                            unlink(WWW_ROOT . $post['Post']['image']);
                        }
                    } else {
                        $this->Session->setFlash(__('The image could not be uploaded. Please, try again.'));
                    }
                } else {
                    $this->Session->setFlash(__('Invalid file type. Please upload an image with jpg, jpeg, png, or gif extension.'));
                }
            } else {
                // If no new image is uploaded, retain the old image
                $data['Post']['image'] = $post['Post']['image'];
            }
    
            // Attempt to save the updated post data
            $this->Post->id = $id;
            if ($this->Post->save($data['Post'])) {
                $this->Session->setFlash(__('The Post has been updated.'), 'default', array('class' => 'success'));
                return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Unable to update the post.'), 'default', array('class' => 'error'));
            }
        }
    
        // If no data is posted, pre-fill the form with existing post data
        if (!$this->request->data) {
            $this->request->data = $post;
        }
    
        $this->set('topics', $this->Post->Topic->find('list'));
    }
    

     
    public function delete($id){
        $this->Post->id = $id;
        if($this->request->is(array('post','put'))){
            if($this->Post->delete()){
                $this->Session->setFlash('The Post has been deleted');
                $this->redirect('index');
            }
        }
    }

}

?>