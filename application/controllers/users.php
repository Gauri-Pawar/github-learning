<!-- users -->
<?php
class Users extends MY_Controller
{
	public function index()
	{
		// $this->load->helper('html');
		$this->load->view('public/articles_list');
	}
}
?>