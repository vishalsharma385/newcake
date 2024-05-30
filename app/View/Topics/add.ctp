<h1>Create topic</h1>

<?php

echo $this->Form->create('Topic');
echo $this->Form->input('user_id');
echo $this->Form->input('title');
//echo$this->Form->input('visible');
echo $this->Form->end('Save Topic');

?>
 <?php
        echo "<br><br><br>";
        echo $this->Html->link('Back', array('controller' => 'topics', 'action' => 'index'));
    ?>
    

