<h1>Topics</h1>
<br>
<?php
if(AuthComponent::user()){
    echo $this->Html->link('logout', array('controller' => 'users', 'action' => 'logout'));
}else{
    echo $this->Html->link('login', array('controller' => 'users', 'action' => 'login'));
}
?>
<br><br>

<table>
<tr>
    <th>id</th>
    <th>Title</th>
    <th>user_id</th>
    <!-- <th>visible</th> -->
    <th>Created</th>
    <th>Modified</th>
    <?php //if(AuthComponent::User('role') == 'Admin' || !AuthComponent::user()) : ?>
    <th>Edit</th>
    <th>Delete</th>
    <?php //endif;?>
</tr>

<?php foreach($topics as $topic): ?>
<tr>
    <td><?php echo $topic['Topic']['id']; ?></td>
    <td><?php echo $this->Html->link($topic['Topic'] ['title'], array('controller'=>'Topics', 'action'=>'view', $topic['Topic']['id']))?></td>
    <td><?php echo $topic['Topic']['user_id']; ?></td>
    <!-- <td><?php //echo $topic['Topic']['visible'] ? $topic['Topic'] ['visible'] : "2"; ?></td> -->
    <td><?php echo $topic['Topic']['created']; ?></td>
    <td><?php echo $topic['Topic']['modified']; ?></td>
    <?php //if(AuthComponent::User('role') == 'Admin' || !AuthComponent::user()) : ?>
    <td><?php echo $this->Html->link('edit', array('controller'=>'Topics', 'action'=>'edit', $topic['Topic']['id'])) ?></td>
    <td><?php echo $this->Form->postLink('delete', array('controller'=>'Topics', 'action'=>'delete', $topic['Topic']['id']), array('confirm' => 'Are you sure')); ?></td>
    <?php// endif;?>
</tr>

<?php endforeach; ?>
</table>

<?php unset($topic); ?> <br>
<button>
<?php echo $this->Html->link('Add a Topic', array('controller' => 'topics', 'action' => 'add')); ?>
</button>
<br><br>
<?php
        echo "<br><br><br>";
        echo $this->Html->link('Back', array('controller' => 'posts', 'action' => 'index'));
    ?>
    


