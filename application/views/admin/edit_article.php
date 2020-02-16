<?php include('admin_header.php');?>

<div class="container"> 
    <h4> Edit  Articles </h4> 
    <br> 
  <?php
  foreach($key as $value)
  {
    echo $value['id'];
    echo $value['title'];
    echo $value['body'];
    ?>

  
  	<?php echo form_open('admin/update_article',['class'=>'f1']); ?> 
   <?php echo form_hidden('article_id',$value['id']);?>
  <div class="form-group row">
    <label for="article" class="col-sm-2 col-form-label"> Article Title </label>
    <div class="col-sm-6">
    	<?php
    	$data = array(
        'name'          => 'title',       
        'placeholder'   => 'Article Title',
        'class'     	=> 'form-control',
        'value'		=> set_value('title',$value['title']) 
		);		
    	?>
      <?php echo form_input($data);?>
    </div>
	<div class="col-sm-4">
    	<?php echo form_error('title',"<span class='text-danger'>","</span>");?>
    </div>	
  </div>

  <div class="form-group row">
    <label for="article body" class="col-sm-2 col-form-label"> Article Body </label>
    <div class="col-sm-6">
      <?php
      $data = array(
        'name'          => 'body',       
        'placeholder'   => 'Article Description',
        'class'       => 'form-control',
        'value'   => set_value('body',$value['body']) 
    );    
      ?>
      <?php echo form_textarea($data);?>
    </div>
  <div class="col-sm-4">
      <?php echo form_error('body',"<span class='text-danger'>","</span>");?>
    </div>  
  </div>  

  <div class="form-group row">
  	<div class="col-sm-2">     
    </div>
    <div class="col-sm-10">
    	<?php echo form_submit(["name"=>"submit","value"=>"Update Article","class"=>"btn btn-primary"]); ?>
    	<?php echo form_reset(["name"=>"submit","value"=>"Reset","class"=>"btn btn-primary"]); ?>   
    </div>
  </div>
</form>

<?php
}
  ?>       
</div> 

<div class="container">

<?php
  if($error=$this->session->flashdata('msg'))
  {     
   ?>

    <div class="alert alert-danger">
    <strong> Succees </strong> <?php echo $error; ?>
  </div>

     <?php
  }
  ?>
</div>

<?php include('admin_footer.php');?>