<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __('Posts and Users'); ?></title>
    <?php
        echo $this->Html->css('like');
        echo $this->Html->css('new');
        echo $this->Html->css('postsindex');
    ?>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- <div class="container"> -->
        <div class="actions">
            <h3><?php echo __('Actions'); ?></h3>
            <ul>
                <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('Login'), array('controller' => 'Users', 'action' => 'login')); ?></li>
                <li><?php echo $this->Html->link(__('Signup'), array('controller' => 'Users', 'action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?></li>
            </ul>
        </div>

        <div class="posts index">
            <h2><?php echo __('Posts'); ?></h2>
            <table cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <!-- <th><?php //echo $this->Paginator->sort('id'); ?></th> -->
                        <!-- <th><?php// echo $this->Paginator->sort('topic_id'); ?></th> -->
                        <th><?php echo $this->Paginator->sort('title'); ?></th>
                        <th><?php echo $this->Paginator->sort('created'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($posts as $post): ?>
                    <tr>
                        <!-- <td><?php //echo h($post['Post']['id']); ?>&nbsp;</td>
                        <td><?php //echo h($post['Post']['topic_id']); ?>&nbsp;</td> -->
                        <td><?php echo $this->Html->link($post['Topic']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>&nbsp;</td>
                        <td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
                        <td><?php echo h($post['Post']['modified']); ?>&nbsp;</td>
                        <td class="actions">
                            <!-- <?php// echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?> -->
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $post['Post']['id']))); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <br>
            <button>
                <?php echo $this->Html->link('Add a Post', array('controller' => 'Posts', 'action' => 'add')); ?>
            </button>
            <br><br><br><br>
        </div>

        <div class="index">
            <h1><b>Users and Their Post Counts</b></h1><br>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Post Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userPostCounts as $userPostCount): ?>
                    <tr>
                        <td><?php echo h($userPostCount['User']['username']); ?></td>
                        <td><?php echo h($userPostCount['User']['full_name']); ?></td>
                        <td><?php echo h($userPostCount['PostCount']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <!-- </div> -->
</body>

</html>
