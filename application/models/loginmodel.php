<!-- loginmodel -->
<?php
class Loginmodel extends CI_Model
{
	public function login_valid($username, $password)
	{
		// $q=$this->db->query("select * from users where uname='$username' and pword='$password'");
		$q=$this->db->where(['uname'=>$username,'pword'=>$password])
					->get('users');

		if($q->num_rows())
		{

			$onerecord=$q->row();
			//echo "<pre>";
			//print_r($onerecord);
			//exit;

			echo "<pre>";			
			return $onerecord->id;
			
			//return TRUE;
		}
		else
		{
			return FALSE;
		}
		
			// if($q->num_rows())		
			// {
				
			// 		return TRUE;
				
			// }
	}
}
?>