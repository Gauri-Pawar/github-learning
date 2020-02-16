<!-- inser_article -->
<?php
class Inser_article extends  CI_Model
{

	public function add_article($title,$descr,$user_id)
	{

		$q=$this->db->query("insert into articles(title,body,user_id) values ('$title','$descr','$user_id')");
		if($q)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}

	}
}
?>