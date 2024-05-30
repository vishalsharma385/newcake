<div class="users index">
    <h2><?php echo __('Users'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('username'); ?></th>
                <th><?php echo $this->Paginator->sort('full_name'); ?></th>
                <th><?php echo $this->Paginator->sort('role'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['full_name']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
        echo "<br><br><br>";
        echo $this->Html->link('Back', array('controller' => 'Posts', 'action' => 'index'));
    ?>

    <!-- <div class="paging">
        <?php
           // echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'disabled'));
            //echo $this->Paginator->numbers(array('separator' => ' '));
            //echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'disabled'));
            
        ?>
    </div> -->
</div>
<div class="actions">
    <h3><?php echo _ ('Actions'); ?></h3>
    <ul>

        <!-- <li><?php// echo $this->Form->postLink(__('Delete'), array('action' => 'delete',$this->Form->value('User.id')), array(), __('Are you sure you want to delete # %s?',$this->Form->value('User.id'))); ?></li>  -->
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?></li> 
        <li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics',' action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login')); ?></li>
        <li><?php echo $this->Html->link(__('Signup'), array('controller' => 'users', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?></li>
        
    </ul>

</div>
