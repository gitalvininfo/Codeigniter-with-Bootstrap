<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
  <?php require 'cssjs.php'?>
</head>
<body>

<?php require('header.php')?>
<div class="container">
  <h3>View All Posts</h3>
<?php if($msg = $this->session->flashdata('msg')): ?>
<?php echo $msg;?>
<?php endif;?>
  <?php echo anchor('welcome/create', 'Add Post', ['class'=>'btn btn-primary btn-md'])?> <br><br>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Date Created</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if(count($posts)):?>
    <?php foreach($posts as $post):?>
      <tr>
        <th><?php echo $post->title;?></th>
        <td><?php echo $post->description;?></td>
        <td><?php echo $post->date_created;?></td>
        <td>
        <?php echo anchor("welcome/view/{$post->id}", 'View', ['class'=>'btn btn-primary btn-sm'])?>
        <?php echo anchor("welcome/update/{$post->id}", 'Update', ['class'=>'btn btn-primary btn-sm'])?>
        <?php echo anchor("welcome/delete/{$post->id}", 'Delete', ['class'=>'btn btn-primary btn-sm'])?>
        </td>
      </tr> 
<?php endforeach;?>
<?php else:?>
<tr>
  <td>No Records Found</td>
</tr>
<?php endif;?>

  </tbody>
</table> 
</div>

</body>
</html>