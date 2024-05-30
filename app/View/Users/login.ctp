<h1>Login In</h1>

<?php
    echo $this->Form->create('User');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->end('Login');
?>
 <?php
        echo "<br><br><br>";
        echo $this->Html->link('Back', array('controller' => 'Posts', 'action' => 'index'));
    ?>