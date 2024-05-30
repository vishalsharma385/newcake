<?php

App::uses('AppController', 'Controller');
App::uses('NotFoundException', 'Exception');

class UsersController extends AppController {

    public $components = array('Paginator', 'Session', 'Auth');

    public function beforeFilter() {
        $this->Auth->allow('add', 'logout');
    }

    public function isAuthorized($user) {
        if ($this->action === 'add') {
            return true;
        }
        if (in_array($this->action, array('edit', 'delete'))) {
            $userId = (int) $this->request->params['pass'][0];
            if ($this->User->isOwnedBy($userId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    public function login() {
        if ($this->request->is('post')) {
            $this->loadModel('User');
            $userData = $this->request->data['User'];
            $user = $this->User->findByUsername($userData['username']);
           // pr($user);
          // pr($userData['username']);
            //exit;
            // pr($this->Auth->password($userData['password']));
           // pr($user['User']['password']);
           //  exit;
            if ($user) {
                if ($userData['username'] === $user['User']['username']) {
                    if($this->Auth->login($user['User']));
                    {
                        $this->Session->setFlash(__('The user has been Logged in'));
                        return $this->redirect($this->Auth->redirectUrl());   
                    }  
                } else{
                    $this->Session->setFlash(__('Incorrect Username or Password'));
                } 
                }

            }
        }

    public function logout() {
        $this->Auth->logout();
        return $this->redirect(array('controller'=>'posts', 'action' => 'index'));
}

    public function index() {
        $this->User->recursive = 0;
       
        $paginate = array(
            'limit' => 5,
        );
        $this->set('users', $this->Paginator->paginate());
    }

    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->findById($id);
        }
    }

    public function delete($id = null) {
        $this->request->allowMethod('post', 'delete');
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}

?>
