<?php

App::uses('AppModel', 'Model');

class Topic extends AppModel {

    public function project(){

       // $useTable = "topics";

    $validate = array(
            'id' => array(
                'rule' => 'notEmpty',
                'message' => 'First name cannot be empty.'
            ),
            'user_id' => array(
                'rule' => 'notEmpty',
                'message' => 'First name cannot be empty.'
            ),
            'title' => array(
                'rule' => 'notEmpty',
                'message' => 'First name cannot be empty.'
            ),
        );

         $hasMany = [
            'Post' => [
                'className' => 'Post',
                'foreignKey' => 'topic_id',
                'dependent' => true
            ]
        ];
        
         $belongsTo = [
            'User' => [
                'className' => 'User',
                'foreignKey' => 'user_id'
            ]
            
        ];
    }
 
    
}