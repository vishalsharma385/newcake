<?php

class Post extends AppModel{

    public $belongsTo = [
        'Topic' => [
            'className' => 'Topic',
            'foreignKey' => 'topic_id'
        ],
        'User' => [
            'className' => 'User',
            'foreignKey' => 'user_id'
        ]
    ];

}

?>