<?php 
session_start();
require("connect.php");
$username = $_SESSION['username'];
$name = $_SESSION['email'];
if(!$username)
{	
	echo "Section has expired";
	header("Location: index.php");
	exit;
}

if(isset($_GET['page']))
	{
		$pages = array("view_order","view");
		if(in_array($_GET['page'],$pages))
		{
			$_page = $_GET['page'];
			
		}
		else
		{
			$_page = "view_order";
		}
	}
	else
	{
		$_page = "view_order";	
	}
?>
<html>
<head>
<title>View Order</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link rel="stylesheet" href = "style.css"/>
</head>
<body>
<table width="900" border="1" align="center">
  <tr>
    <td colspan="2"><?php require('header.php');?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33" align="center">Welcome <?php echo $username;?> <a href="logout.php"> | Logout</a></td>
  </tr>
  <tr>
    <td width="17" bgcolor="#FFCC33"><?php require('supAdminSidebar.php'); ?>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    </td>
    <td width="867">
    <b>
    <p><h3>Client Order Request's</h3></p></b>
	 <div id = "container">
        <div id="main">
        
        	<?php require($_page.".php"); ?>
            
      </div><!--end of main-->
        
        <div id="sideBar" style="padding:5px 1px 35px 35px">
        <h1><u>ORDER REFERRENCE NUMBER</u></h1>
        <?php	
           if(isset($_SESSION['cart']))
		   {
				$sql = "SELECT * FROM cust_order WHERE order_id IN(";
				foreach($_SESSION['cart'] as $id => $value)
		   		{
					$sql.=$id.",";
				}
				$sql = substr($sql, 0, -1).") ORDER BY order_id ASC";
				$query = mysql_query($sql);
				
				while($row = mysql_fetch_array($query))
				{
					$_SESSION['cust_email'] = $custEmail;
					?>
                    
                    <p><?php echo "Order belongs to ".$row['cust_email'] ?></p>
                    
                   <?php
					
				}
				
			
		   }
        ?>
        </div><!--end of sidebar-->
</div>
  </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33"><?php require('footer.php'); ?></td>
  </tr>
</table>


</body>
</html>