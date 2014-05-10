<?php
class insertAdmin
{
	//private $name,$surname,$idNum,$cellNum,$telNum,$address,$email,$password,$cPassword;
	
	public function insert($name,$surname,$email,$password,$cPassword,$address)
	{
		if($name)
		{
			if($surname)
			{
				if($email)
				{
					if($address)
					{
						if($password)
						{
							if($cPassword)
							{
								if($password == $cPassword)
								{
									require('connect.php');
									$status = "admin";						
									$query = mysql_query("INSERT INTO users values('".$name."','".$surname."','".$password."','".$email."','".$address."','".$status."')");
	
									if(!$query)
									{
										print '<script type="text/javascript">';
										print 'alert("Registration was not successful. Please try again")';
										print '</script>';
										exit();
									}
									else
									{
										print '<script type="text/javascript">';
										print 'alert("Registration successful.")';
										print '</script>';
										exit();
										header("Location: insertMember.php");
									}
									mysql_close();
								}
								else
								{
									echo'Name was not entered.';
									exit;
								}
							}
							else
							{
								echo'Please confirm your password.';
								exit;
							}
						}
						else
						{
							echo'Password was not entered.';
							exit;
						}
					}
					else
					{
						echo'Address was not entered.';
						exit;
					}
				}
				else
				{
					echo'Email was not entered.';
					exit;
				}
			}
			else
			{
				echo'Surname was not entered.';
				exit;
			}
		}
		else
		{
			echo'Name was not entered.';
			exit;
		}
		
	}
}
?>