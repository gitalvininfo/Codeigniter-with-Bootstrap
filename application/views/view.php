<?php
    require 'header.php';
    require 'cssjs.php';
?>

<div class="container">
    <h3>View Post</h3>
    <h4>Title : <?php echo $post->title;?></h4>
    <p>Description : <?php echo $post->description;?></p>
    <p>Date Created : <?php echo $post->date_created;?></p>
    <?php echo anchor('welcome', 'Back', ['class'=>'btn btn-primary btn-md'])?>
</div>