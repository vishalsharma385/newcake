<?php
class Comment extends AppModel {
    public $useTable = "comments";

    public $validate = array(
        'username' => array(
            'rule' => 'notBlank',
            'message' => 'Username cannot be empty.'
        ),
        'comment' => array(
            'rule' => 'notBlank',
            'message' => 'Comment cannot be empty.'
        ),
        'postid' => array(
            'rule' => 'notBlank',
            'message' => 'Post ID cannot be empty.'
        ),
    );

   public $belongsTo = array(
        'Post' => array(
            'className' => 'Post',
            'foreignkey' => 'postid',
        )   
    );
}
?>