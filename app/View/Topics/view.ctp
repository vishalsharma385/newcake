
<?php //pr($posts); ?>

<h1> <?php echo $topics['Topic']['title']; ?> </h1><br><br>
<h1> <?php //echo $posts['Post']['body']; ?> </h1><br><br>

<?php  echo $this->Html->link('Create a Post in this Topic', array('controller'=>'Posts', 'action'=>'add', $topics['Topic'] ['id'])); 
echo "<br><br><br>";
 echo $this->Html->link('Back', array('controller' => 'topics', 'action' => 'index'));
 ?>


<!-- <table>
<tr><td>Sr.No.</td><td>User</td><td>Post</td></tr>
<?php
    // $counter = 1;
    // foreach($topics['post'] as $posts){
    //     echo "<tr><td>".$counter."</td><td>".$posts['user_id']."</td><td>".$posts['body']."</td></tr>";
    //     $counter++;
    // }
?>
</table> -->
