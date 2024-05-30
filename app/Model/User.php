<?php

class User extends AppModel {

    public $validate = array(
        'username' => array(
            'rule' => 'notEmpty',
            'message' => 'Username cannot be empty.'
        ),
        'password' => array(
            'rule' => 'notEmpty',
            'message' => 'Password cannot be empty.'
        ),
        'full_name' => array(
            'rule' => 'notEmpty',
            'message' => 'Fullname cannot be empty.'
        ),
        'role' => array(
            'rule' => 'notEmpty',
            'message' => 'Role cannot be empty.'
        ),
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }


    public function isOwnedBy($userId, $ownerId) {
        return $this->field('id', array('id' => $userId, 'user_id' => $ownerId)) !== false;
    }
    // public function isAuthorized($user) {
    //     if (isset($user['role']) && $user['role'] === 'admin') {
    //         return true;
    //     }
    //     return false;
    // }
    public $hasMany = [
        'Post' => [
            'className' => 'Post',
            'foreignKey' => 'user_id',
            'dependent' => true
        ],
        'Topic' => [
            'className' => 'Topic',
            'foreignKey' => 'id',
            'dependent' => true
        ]
    ];

    public function getAllUsers(){
        $list = $this->find('all',array('fields' => 'username'));
        return $list;
    }

}

?>
