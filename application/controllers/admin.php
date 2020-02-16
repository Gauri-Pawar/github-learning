<!-- admin -->
<?php
class Admin extends MY_Controller
{
	public function dashboard()
	{
			$this->load->helper('url'); //already load not need
			//$userid=$this->session->userdata('uid');	
			$this->load->model('articlemodel');
			$articles['key']=$this->articlemodel->article_list();
			$this->load->view('admin/dashboard',$articles);
	 
	
}
	public function add_articles()
	{
		
		$this->load->library('form_validation');
		$this->load->helper('form'); //already load not need 
		$this->load->view('admin/add_articles');
	}
	public function store_article()
	{	
		$this->load->library('form_validation');	
		// return json_encode(['status' => 203, 'msg' => 'It can not be deleted. try again!']);		
         // echo  json_encode(['status' => 200, 'message'=> 'saved successfully']);
         //              exit;
		if($this->form_validation->run('add_articles'))
		{
				$post=$this->input->post();

				unset($post['submit']);
				$this->load->model('articlemodel');
				$ins=$this->articlemodel->add_article($post);
				if($ins)
				{
					
                      // return json_encode(['status' => 200, 'message'=> 'saved successfully']);
                      // exit;
					$this->session->set_flashdata('feedback', 'record inserted');
					$this->session->set_flashdata('feedback_class', 'alert-success');
					return 	redirect('admin/dashboard');
				}
				else
				{
					// return json_encode(['status' => 400, 'message'=> 'not saved successfully']);
     //                  exit;
					$this->session->set_flashdata('feedback', 'record not inserted');
					$this->session->set_flashdata('feedback_class', 'alert-danger');
					return 	redirect('admin/dashboard');
				}
		}
		else
		{
			// return json_encode(['status' => 400, 'message'=> 'not saved successfully']);
   //                    exit;
			$this->load->view('admin/add_articles');
			return redirect('admin/add_articles');
		}
	}
	public function edit_article($article_id)
	{
		// echo $article_id;
		// exit;
		// $this->load->helper('form');
		$this->load->model('Articlemodel');
		
		$result['key']=$this->Articlemodel->find_articles($article_id);

		// echo "<pre>";
		// print_r($result);
		// exit;
		$this->load->view('admin/edit_article',$result);
	}
	public function update_article()
	{
		$this->load->library('form_validation');			
		
		
				$post=$this->input->post();	
				$id=$this->input->post('article_id');	
				
				unset($post['submit'],$post['article_id']);
				//unset($id);
				// print_r($post);
				// exit;			
				
				$this->load->model('articlemodel');
				$upd=$this->articlemodel->update_article($post,$id);
				if($upd)
				{					
					$this->session->set_flashdata('feedback', 'record Updated suceessfully');
					$this->session->set_flashdata('feedback_class','alert-success');
					return 	redirect('admin/dashboard');
				}
				else
				{
					$this->session->set_flashdata('feedback', 'sorry something get wrong');
					$this->session->set_flashdata('feedback_class', 'alert-danger');
					return 	redirect('admin/dashboard');
				}	
	}
	public function delete_article()
	{
		$article_id=$this->input->post('article_id');
		$this->load->model('articlemodel');
		if($this->articlemodel->delete_article($article_id))
		{
			$this->session->set_flashdata('feedback', 'record Deleted suceessfully');
			$this->session->set_flashdata('feedback_class','alert-success');
			return 	redirect('admin/dashboard');
		}
		else
		{
			$this->session->set_flashdata('feedback', 'sorry something get wrong');
			$this->session->set_flashdata('feedback_class', 'alert-danger');
			return 	redirect('admin/dashboard');
		}
	}

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('uid'))
		{
				return redirect('login');
		}

	}
}
?>
