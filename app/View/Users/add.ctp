<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>

    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('full_name');
        echo $this->Form->input('role', ['options' => ['Admin' => 'Admin', 'Author' => 'Author']]);
    ?>
    </fieldset>
<?php echo $this->Form->end( ('Submit')); ?>
<?php
        echo "<br><br><br>";
        echo $this->Html->link('Back', array('controller' => 'posts', 'action' => 'index'));
    ?>
    
</div>
<!-- <div class="actions">
    <h3><?php //echo __('Actions'); ?></h3>
    <ul>
        
        <li><?php //echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
        <li><?php //echo $this->Html->link(__('List Posts'), array('controller' => 'posts','action' => 'index')); ?> </li> 
        <li><?php //echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
        <li><?php //echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
        <li><?php //echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action'> 'add')); ?> </li>

    </ul>

</div> -->

