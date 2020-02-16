<?php include('admin_header.php');?>

<div class="container">
  <?php
  if($this->session->flashdata('feedback'))
  {
    $feedback=$this->session->flashdata('feedback'); 
    $feedback_class=$this->session->flashdata('feedback_class'); 

    ?>

    <div class="alert <?php echo $feedback_class;?> ">
    <strong> <?php echo $feedback; ?></strong> 
  </div>

     <?php
  }
  ?>  
  </div>

<div class="container">
  <div class="row">
    <div class="col-sm-12 text-right mt-50">
      <a href="<?php echo site_url('admin/store_article') ?>" class="btn btn-info pull-left" role="button"> Add Arcticles </a> 
    </div>
  </div>
	 <div class="table-responsive mt-20">

    <table class="table">
      <thead>
        <tr>
          <th> SR.no</th>
          <th> Title </th>
          <th> Action </th> 
        </tr>
      </thead>
      <tbody>

       <?php
       
       if(count($key))
       {
        $cnt=1;
        foreach ($key as $article)
         {
          ?>
          <tr>
          <td> <?php echo $cnt; ?> </td>
          <td> <?php echo $article['title'];?> </td>

          <td>
            <div class="row">
              <div class="col-sm-2">
                 <a href="<?php echo base_url() ?>admin/edit_article/<?php echo $article['id']; ?>" class="btn btn-primary"> Edit </a> <!-- value getting by get method  u can write this by anchor tag by using of html helper -->  
              </div>

              

               <div class="col-sm-2">
                <?php echo form_open('admin/delete_article', array('onsubmit' => 'return confirm()')); ?> 
               <?php $data=array(                        
                          'type'  => 'hidden',
                          'name'  =>'article_id',
                          'class' => 'btn btn-danger',
                           'value'   => $article['id']
                        );
                        ?>
                <?php echo form_input($data); ?>   
                <?php echo form_submit(["name"=>"submit","value"=>"Delete","class"=>"btn btn-danger" 
                ]); ?>       
              <!--   <input type="hidden" name="title" placeholder="" class="form-control" value="abc">  -->

              <!--   <a href="#" class="btn btn-danger" name="submit"  role="button"> Delete </a> -->
                <!--  <a href="#" class="btn btn-danger" role="button"> Delete </a></td>      -->               

            </form>                
              </div>
            </div>
            </td>         
          
        </tr>

          <?php
           
          $cnt++;
         }
     }
     else
     {
      ?>
      <tr>
        <td colspan="3">No record found</td>

      </tr>
      <?php
       
     }
   
     
       ?>

        

      </tbody>
    </table>
  </div>
</div>

<script>
function confirm()
{

  var job=confirm("Are you sure to delete permanently?");
if(job!=true){
  return false;
  }
  else
  {
    return false;
  }
}
</script>

<?php include('admin_footer.php');?>