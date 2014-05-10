<?php
	class Login
	{
		public function userLogin($email,$password)
		{
			if($email)
					{
						if($password)
						{
							require('connect.php');
									
							$query = mysql_query("SELECT * FROM users WHERE email='$email'");
							$numrows = mysql_num_rows($query);
							if($numrows == 1)
							{
								$row = mysql_fetch_assoc($query);
								$dbname = $row['name'];
								$dbpassword = $row['password'];
								$dbstatus = $row['status'];
								$dbEmail = $row['email'];
											
								if($password == $dbpassword)
								{
									if($dbstatus == "super_admin") 
									{
										$_SESSION['username'] = $dbname;
										$_SESSION['user'] = $dbsurname;
										$_SESSION['email'] = $dbEmail;
										header("Location: supInsertProduct.php");
										exit;
									}
									else if($dbstatus == "admin")
									{
										$_SESSION['username'] = $dbname;
										$_SESSION['user'] = $dbsurname;
										$_SESSION['email'] = $dbEmail;
										header("Location: viewOrder.php");
										exit;
									}
									else
									{
										$_SESSION['username'] = $dbname;
										$_SESSION['user'] = $dbsurname;
										$_SESSION['email'] = $dbEmail;
										header("Location: product_cart.php");
									}
								}
							else
							{
								echo "<p style='color:blue' style='font-size:12px'>"."<a href='forgotPass.php'>Forgot password?</a>"."</p>";
								exit;
							}
						}
						else
						{
							echo "<p style='color:red'>".'User was not found! Please make all input is correct.'."</p>";
							exit;
						}
									
						mysql_close();
					}
					else
					{
						echo "<p style='color:red'>".'Please enter password.'."</p>";
						exit;
					}
				}
				else
				{
					echo "<p style='color:red'>".'Please enter your email.'."</p>";
					exit;
				}		
		}
	}
?>