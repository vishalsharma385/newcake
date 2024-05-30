<?php

class TopicsController extends AppController {
    public $helpers = array('Form', 'Html');
    public $components = array('Session'); 
    public $uses = array('Topic');
    
    public function index() {
        $this->set('title', 'Topic Index');
        $data = $this->Topic->find('all');
        $this->set('topics', $data);
        // find logged in user detail and its role
        // pass role into sctp file // set
        // $user = $this->Auth->user();
        // $role = $user ? $user['role'] : 'guest';
        // $this->set('userRole', $role);

    }


    public function add() {
        $this->set('title', 'Add Topic');
        $this->loadModel('User');
       // $list = $this->User->getAllUsers();
       // pr( $this->Auth->user());
       // $data=$this->User->find('all');
       // pr( $this->request->data['User']['id']);
      // pr($d);
        //exit;
       // pr($list);exit;
        if ($this->request->is('post')) {
            pr($this->request->data['Topic']['user_id']);
        //    $xya= $this->Article->find('id', array(
        //         'conditions' => array('User.username' => 12345)
        //     ));
           // pr($xya);
           // exit;
           // $this->request->data['Topic']['user_id'] = $this->Auth->user('username');
            if ($this->Topic->save($this->request->data)) {
                $this->Session->setFlash(__('The topic has been saved.'), 'default', array('class' => 'success'));
                return $this->redirect(array('controller' => 'topics', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Unable to save the topic.'), 'default', array('class' => 'error'));
            }
        }
        $this->set('users', $this->User->find('list'));

    }

    public function view($id){
       $data = $this->Topic->findById($id);
       $this->loadModel('Post');
       $bod = $this->Post->findById($id);
       //pr($bod);
       //exit;
       $this->set('topics', $data);
       $this->set('posts', $bod);
    }

    public function edit($id){
        $data = $this->Topic->findById($id);
        if($this->request->is(array('post','put'))){
            $this->Topic->id = $id;
            if($this->Topic->save($this->request->data)){
                $this->Session->setFlash('The topic has been edited!');
                $this->redirect('index');
            }
        }
        $this->request->data = $data;
    }

     
    public function delete($id){
        $this->Topic->id = $id;
        if($this->request->is(array('post','put'))){
            if($this->Topic->delete()){
                $this->Session->setFlash('The topic has been deleted');
                $this->redirect('index');
            }
        }
    }
 
}

?>
