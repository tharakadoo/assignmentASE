<?php
class MY_Form_validation extends CI_Form_validation {
	function nic_check($str)
	{
		$pattern='^([0-9]{9}[v|V])$^';
		if(preg_match($pattern, $str)){
			return TRUE;
		} else{
			$this->set_message('nic_check', 'Valid NIC No required');
			return FALSE;
		}
	}

	function tp_check($str)
	{
		$pattern1='^([0]\d{2}-\d{7})$^';
		$pattern2='^([0]\d{9})$^';
		if((preg_match($pattern1, $str)) || (preg_match($pattern2, $str))){
			return TRUE;
		} else{
			$this->set_message('tp_check', 'Valid Telephone No required');
			return FALSE;
		}
	}

	function strong_password_check($str)
	{
		$pattern1='^\S*(?=\S{8,})(?=\S*[A-Z])(?=\S*[\W])\S*$^';
		if((preg_match($pattern1, $str))){
			return TRUE;
		} else{
			$this->set_message('strong_password_check', 'Password should be at least 8 characters long, should include at least one special character and one capital letter');
			return FALSE;
		}
	}
}
