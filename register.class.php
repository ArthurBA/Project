<?php
error_reporting(E_ALL ^ E_NOTICE);
class register
{
	private $name;
	private $surname;
	private $idNum;
	private $cellNum;
	private $telNum;
	private $address;
	private $email;
	private $password;
	private $cPassword;
	
	public function registerMember($name,$surname,$password,$cPassword,$email,$address,$status)
	{
		if($name)
		{
			if($surname)
			{
				if($email)
				{
					if(@ereg('^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$',$email))
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
										$query = mysql_query("INSERT INTO users VALUES('".$name."','".$surname."','".$password."','".$email."','".$address."','".$status."')");
										if($query)
										{
											print '<script type="text/javascript">';
											print 'alert("Successfully registered")';
											print '</script>';
										}
										else
										{
											print '<script type="text/javascript">';
											print 'alert("Registration failed. Please try again")';
											print '</script>';	
										}
									}
									else
									{
										echo '<h5 style="color:red">Passwords do not match</h5>';
										exit;
									}
								}
								else
								{
									echo '<h5 style="color:red">Please confirm password</h5>';
									exit;
								}
							}
							else
							{
								echo '<h5 style="color:red">Password was not entered</h5>';
								exit;
							}
						}
						else
						{
							echo '<h5 style="color:red">Address was not entered</h5>';
							exit;
						}
					}
					else
					{
						echo 'Email is not a valid email. Please check your email or go and register a email account';
						echo '<br/><br/><a href='.header("Location: www.gmail.com").'>Click here to create an email account</a>';
						exit;
					}
				}
				else
				{
					echo '<h5 style="color:red">Email was not entered</h5>';
					exit;	
				}
			}
			else
			{
				echo '<h5 style="color:red">Surname was not entered</h5>';
				exit;
			}
		}
		else
		{
			echo '<h5 style="color:red">Name was not entered</h5>';
			exit;
		}
	}
}
?>