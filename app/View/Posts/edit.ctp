<h1>Edit Post</h1>

<?php

echo $this->Form->create('Post',array('type' => 'file'));
//echo $this->Form->input('topic_id');
echo $this->Form->input('image',array('type' => 'file'));
echo $this->Form->input('body', array('rows' => '5'));
echo $this->Form->end('Edit the Post');

?>
 <?php
        echo "<br><br><br>";
        echo $this->Html->link('Back', array('controller' => 'Posts', 'action' => 'index'));
    ?>
