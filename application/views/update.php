<?php
    require 'header.php';
    require 'cssjs.php';
?>
<div class="container">
    <div class="col-md-6">

    <?php echo form_open("welcome/change/{$post->id}", ['class' => 'form-horizontal']);?>
  <fieldset>
    <legend>Edit Post</legend>
    
    <div class="form-group">
      <label for="Title">Title</label>
      <?php echo form_input(['name' => 'title', 'placeholder' => 'Title', 'class' => 'form-control', 'value'=>set_value('title', $post->title)]);?>
    </div>
    <div>
        <?php echo form_error('title', '<div class="text-danger">', '</div>');?>
    </div>
    <div class="form-group">
      <label for="Description">Description</label>
      <?php echo form_input(['name' => 'description', 'placeholder' => 'Description', 'class' => 'form-control', 'value'=>set_value('description', $post->description)]);?>
    </div> 
    <div>
    <?php echo form_error('description', '<div class="text-danger">', '</div>');?>
    </div>
    <?php echo form_submit(['name' => 'submit', 'value' => 'Update', 'class' => 'btn btn-primary']);?>
    <?php echo anchor('welcome', 'Back', ['class'=>'btn btn-primary btn-md'])?> <br><br>
    </fieldset>
    <?php echo form_close();?>

</div>
</div>