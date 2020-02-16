<!-- articlemodel -->
<?php
class Articlemodel extends CI_Model
{ 
	public function article_list()
	{
		//$this->load->library('session');
		$userid=$this->session->userdata('uid');
        //echo $userid;
        //exit;

		$q=$this->db->select(['title','id']) 
					->from("articles")
					->where('user_id',$userid)
     				->get();

     				
     				return $q->result_array();


		// if($q)
		// {
		// 	echo "hii";
		// 	exit;
		// }

	}
	public function add_article($post)
	{
		$q=$this->db->insert('articles', $post);
		if($q)
		{
			return TRUE;
		}
		else
		{
			return TRUE;
		}

	}
	public function find_articles($article_id)
	{
		// echo $article_id;
		// echo "hii";
		// exit;
		$query=$this->db->select(['id','title','body'])
				 ->where('id',$article_id)
				 ->from('articles')
				 ->get();
				 if($query)
				 {
				 	$result=$query->result_array();				 	
				 	return($result);
				 }
				 else
				 {
				 	echo "hii2";
				 	exit;
				 }
	}
	public function update_article($post,$article_id)
	{
		$query=$this->db->where('id',$article_id)
    			 		->update('articles',$post);
		if($query)
		{
			return TRUE;
		}
		else
		{
			return False;
		}

	}
	public function delete_article($article_id)
	{
		$query= $this->db->where('id', $article_id)
   				         ->delete('articles'); 
   				  if($query)
   				  {
   				  	 return TRUE;
   				  }
   				  else
   				  {
   				  	 return False;
   				  }
	}


}
?>