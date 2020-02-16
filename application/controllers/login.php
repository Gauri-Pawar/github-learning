<!-- login -->
<?php
class Login extends MY_Controller
{
	public function index()
	{
		if($this->session->userdata('uid'))
			return redirect('admin/dashboard');
		$this->load->helper('form');		
		$this->load->view('public/admin_login');
				
	
	}
	public function admin_login()
	{
		$this->load->library('form_validation');
		// $this->form_validation->set_rules('username','User Name','trim|required|alpha');
		// $this->form_validation->set_rules('password','Password','required');	

		if($this->form_validation->run('admin_login'))
		{
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			
			$this->load->model('loginmodel');
			$userid=$this->loginmodel->login_valid($username,$password);
			if($userid)
			{				
				$this->load->library('session');
				$this->session->set_userdata('uid',$userid);					
					return redirect('admin/dashboard');
			}
			else
			{
				$this->session->set_flashdata('login_failed', 'username password does not match');
				return 	redirect('login');
			}
			//echo "username ". $username."<br>"."password ".$password;
		}
		else
		{
			$this->load->view('public/admin_login');		
			
		}
	}

	public function logout()
	{
		$this->load->helper('url');
		$this->session->unset_userdata('uid');
		return redirect('login');
	}
}
?>