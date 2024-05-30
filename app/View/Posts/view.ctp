<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php // echo h($posts['Post']['title']); ?></title>
    <?php
        echo $this->Html->css('like');
        echo $this->Html->css('new');
        echo $this->Html->css('comment'); // Added CSS for comments
    ?>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <img src="<?php echo $this->Html->url('/app/webroot/' . $posts['Post']['image']); ?>" alt="Anime" />
            </div>
            <div class="card-body">
                <span class="tag tag-teal">Anime</span>
                <h4><?php // echo h($posts['Post']['title']); ?></h4>
                <p><b><?php echo nl2br(h($posts['Post']['body']))."<br>"; ?></b></p>
                <div class="user">
                    <div class="user-info">
                        <p>Created: <?php echo "<br>".date('F j, Y', strtotime($posts['Post']['created'])); ?></p>
                        <br><br><br>
                        <?php echo $this->Html->link('Back', array('controller' => 'Posts', 'action' => 'index'), array('class' => 'back-link')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="be-comment-block">
        <h1 class="comments-title">Comments (<?php echo count($comments); ?>)</h1>
        <?php foreach ($comments as $row): ?>
            <?php if($row['Comment']['postid'] == $posts['Post']['id']) { ?>
            <div class="be-comment">
                <div class="be-img-comment">
                    <!-- Placeholder for user avatar -->
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="user" class="be-ava-comment">
                </div>
                <div class="be-comment-content">
                    <span class="be-comment-name">
                        <?php echo " Username: " . h($row['Comment']['username']); ?>
                    </span>
                    <span class="be-comment-time">
                        <i class="fa fa-clock-o"></i>
                        <?php// echo date('F j, Y \a\t g:ia', strtotime($row['Comment']['created'])); ?>
                    </span>
                    <p class="be-comment-text">
                        <?php echo " Comment: " . h($row['Comment']['content']); ?>
                    </p>
                </div>
            </div>
            <?php } ?>
        <?php endforeach; ?>

        <br><br>
        <h3><b>Add a comment</b></h3>

        <?php echo $this->Form->create('Comment', array('class' => 'form-block')); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="form-group fl_icon">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <?php echo $this->Form->input('username', array('class' => 'form-input', 'placeholder' => 'Your name', 'label' => false)); ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 fl_icon">
                <div class="form-group fl_icon">
                    <div class="icon"><i class="fa fa-envelope-o"></i></div>
                    <?php echo $this->Form->input('email', array('class' => 'form-input', 'placeholder' => 'Your email', 'label' => false)); ?>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <?php echo $this->Form->textarea('content', array('class' => 'form-input', 'required' => true, 'placeholder' => 'Your text')); ?>
                </div>
            </div>
            <div class="col-xs-12">
                <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary pull-right')); ?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

</footer>
</html>
