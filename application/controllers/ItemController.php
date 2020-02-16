
<?php

class ItemController extends MY_Controller
{
	public function ajaxrequestPost()
	{
		
		//$this->load->db();
		$data['data']=$this->db->get('test')->result();
	   $this->load->view('admin/itemlist',$data);
	}
	public function ajaxrequestPostinsert()
	{
		// $data=array(
		// 	'title'=>$this->input->post('title'),
		// 	'description'=>$this->input->post('description')
		// );
		$title=$this->input->post('title');
		$description=$this->input->post('description');
		//echo $title;exit();
		$this->db->query("insert into test (title,description) values ('$title','$description')");
		echo "record inserted";
	}
	public function display()
	{
		$record['record']=$this->db->get('test')->result();
		//echo "ggg";exit();
	   	$this->load->view('admin/itemlist',json_encode($record));
	}
}
?>