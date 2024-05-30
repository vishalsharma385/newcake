<div class="users view">
    <h2><?php echo __('User'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd><?php echo h($user['User']['id']); ?>&nbsp;</dd>
        <dt><?php echo __('Username'); ?></dt>
        <dd><?php echo h($user['User']['username']); ?>&nbsp;</dd>
        <dt><?php echo __('Full Name'); ?></dt>
        <dd><?php echo h($user['User']['full_name']); ?>&nbsp;</dd>
        <dt><?php echo __('Role'); ?></dt>
        <dd><?php echo h($user['User']['role']); ?>&nbsp;</dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd><?php echo h($user['User']['created']); ?>&nbsp;</dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd><?php echo h($user['User']['modified']); ?>&nbsp;</dd>
    </dl>

    <div class="actions">
        <h3><?php echo __('Operation'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?></li>
            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?></li>
            <li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?></li>
        </ul>
        <?php
        echo "<br><br><br>";
        echo $this->Html->link('Back to Home page', array('controller' => 'Posts', 'action' => 'index'));
    ?>
    </div>
    <div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <!-- <li><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete',$this->Form->value('User.id')), array(), __('Are you sure you want to delete # %s?',$this->Form->value('User.id'))); ?></li>  -->
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?></li> 
        <li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics',' action' => 'add')); ?></li>
    </ul>
    

</div>
</div>
