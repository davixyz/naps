<?php
class Main_model extends CI_Model {
	function sign_in($mail,$pass){
		$query = $this -> db -> get_where('admin_user', array('mail' => $mail, 'password' => md5($pass)));
		$arr;
		if($query->num_rows()==1){
			$user = $query -> row_array();
			$this -> db -> update('admin_user', array('last_log' => date("Y-m-d h:i:s")), array('id_admin_user' => $user['id_admin_user']));
			$arr = array("resp"=>1,"user"=>$user);
		}else{
			$arr = array("resp"=>0);
		}
		return $arr;
	}
}
?>