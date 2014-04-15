<?php
class insertAdmin
{
	private $name,$surname,$idNum,$cellNum,$telNum,$address,$email,$password,$cPassword;
	
	public function name($name)
	{
		if(!$name)
		{	
			print '<script type="text/javascript">';
			print 'alert("Name was not entered")';
			print '</script>';
		}
		
	}
	
	public function surname($surname)
	{
		if(!$surname)
		{
			print '<script type="text/javascript">';
			print 'alert("Surname was not entered")';
			print '</script>';
		}
		
	}
	
	public function id($idNum)
	{
		if(!$idNum)
		{
			print '<script type="text/javascript">';
			print 'alert(ID Number was not entered")';
			print '</script>';
		}
	}
	
	public function cell($cellNum)
	{
		if($cellNum)
		{
			$cellNum = "N/A";
		}
			
	}
	public function tell($telNum)
	{
		if($telNum)
		{
			$telNum = "N/A";
		}
				
	}
	
	public function address($address)
	{
		if(!$address)
		{
			print '<script type="text/javascript">';
			print 'alert("Car price was not entered")';
			print '</script>';
		}
	}
	
	public function email($email)
	{
		 if(!eregi('^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$',$email))
		 {
			print '<script type="text/javascript">';
			print 'alert("Not valid email.")';
			print '</script>';
			
		 }
		 if($email = "")
		 {
			print '<script type="text/javascript">';
			print 'alert("Email not entered")';
			print '</script>';
			
		 }
			
	}
	
	public function password($password)
	{
		if(!$password)
		{
			print '<script type="text/javascript">';
			print 'alert("Password was not entered")';
			print '</script>';
		}
	}
	

}
?>