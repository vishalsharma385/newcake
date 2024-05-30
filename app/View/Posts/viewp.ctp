<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        echo $this->Html->css('like');
        echo $this->Html->css('new'); ?>
    <div class="container">
  <div class="card">
    <div class="card-header">
      <img src="https://img.freepik.com/premium-photo/anime-game-background_670382-233380.jpg" alt="rover" />
    </div>
    <div class="card-body">
      <span class="tag tag-teal">Anime</span>
      <h4>
        <?php// echo h($post['Post']['title']); ?> 
      </h4>
      
      <p>
      <p><b><?php echo h($posts['Post']['body']); ?></b></p>
      </p>
      <div class="user">
        <!-- <img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo" alt="user" /> -->
        <div class="user-info">
        <p><small>Created: <?php echo h($posts['Post']['created']); ?></small></p>
        <?php
        echo "<br><br><br>";
        echo $this->Html->link('Back', array('controller' => 'Posts', 'action' => 'index'));
        ?>
        </div>
      </div>
    </div>
  </div>
    <!-- <div class="comments-section">
        <?php //foreach ($comment as $row) : ?>
            <?php //if($row['Comments']['postid']==$post['Post']['id']){ ?>
            <div class="comment-box">
                <div class="comment-header">
                    <strong><?php //echo('Username: '. $row['Comments']['username']); ?></strong>
                    <span class="comment-time"><?php //echo 'Time:' .($row['Comments']['created']); ?></span>
                </div>
                <div class="comment-content">
                    <?php //echo($row['Comments']['content']); ?>
                </div>
                <div class="comment-email">
                    <?php //echo h('Email: ' . $row['Comments']['mail']); ?>
                </div>
            </div>
            <hr>
            <?php// } ?>
        <?php //endforeach; ?>

        <button class="like-button" id="button">
            <span class="like-icon"></span>
            Like
        </button>
        <div id='p'></div>
        <hr>
    </div>

   <?php //echo $this->Form->create('Comments'); ?>
   <?php //echo $this->Form->input('username'); ?>
   <?php //echo $this->Form->input('mail'); ?>
   <?php //echo $this->Form->input('content'); ?>
   <?php //echo $this->Form->end('Submit'); ?>

    ?>

    <script>
        $(document).ready(function() {
            $('#button').click(function() {
                var post_id = <?php //echo ($post['Post']['id']); ?>;
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/copy/Posts/like',
                    data: {
                        post_id: post_id
                    },
                    success: function(response) {
                        console.log("hhm");
                        $('#p').text(response);
                    }
                });
            });
        });
    </script> -->
</body>

</html>

<?php 
//  echo $topics['Topic']['title'];
//  echo "<br><br>";
 //echo $posts['Post']['body'];
 //echo "<br><br>";

 ?> 


<!-- 
<h3> Comments</h3>
<div>
        <?php //foreach ($comment as $row): ?>
            <div class="comment">
                <p><strong><?php// echo $row['username']; ?>:</strong></p>
                <p><?php// echo ($row['comment']); ?></p>
            </div>
        <?php// endforeach; ?>
         <p>No comments yet.</p> 
</div>
<hr>
<hr><hr>
 
<?php //echo $this->Form->create('comment'); ?>
<?php//// echo $this->Form->input('username'); ?>
<?php ////echo $this->Form->input('comment', array('rows' => '5'));?>
<?php// echo $this->Form->end('Post Comment');?>


<?php

 //echo $this->Html->link('Back', array('controller' => 'Posts', 'action' => 'index'));

 ?>
 -->
