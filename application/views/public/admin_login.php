<!-- admin_login -->

 <?php include('public_header.php');?>

	<div class="container"> 
    <h4>Inline Form</h4> 
    <br> 
  
  	<?php echo form_open('login/admin_login','class="f1"'); ?>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-6">
    	<?php
    	$data = array(
        'name'          => 'username',       
        'placeholder'   => 'Name',
        'class'     	=> 'form-control',
        'value'		=> set_value('username') 
		);		
    	?>

      <?php echo form_input($data);?>
    </div>
	<div class="col-sm-4">
    	<?php echo form_error('username',"<span class='text-danger'>","</span>");?>
    </div>
	
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>    
    <div class="col-sm-6">
    	<?php
    	$data=array("name"=>"password","placeholder"=>"Enter Password","class"=>"form-control","value"=>set_value('password'));
    	?>
    	<?php echo form_password($data); ?>     
    </div>
    <div class="col-sm-4">
    	<?php echo form_error('password','<span class="text-danger">','</span>');?>
    </div>
  </div>  

  <div class="form-group row">
  	<div class="col-sm-2">     
    </div>
    <div class="col-sm-10">
    	<?php echo form_submit(["name"=>"submit","value"=>"Login","class"=>"btn btn-primary"]); ?>
    	<?php echo form_reset(["name"=>"submit","value"=>"Cancel","class"=>"btn btn-primary"]); ?>   
    </div>
  </div>
</form>       
</div> 
<div class="container">
  <?php
  if($this->session->flashdata('login_failed'))
  {
    $error=$this->session->flashdata('login_failed');   
    ?>

    <div class="alert alert-danger">
    <strong> oops!</strong> <?php echo $error; ?>
  </div>

     <?php
  }
  ?>
     

   
  
  </div>


  <?php include('public_footer.php');?>

 
