<?php
	session_start();
	require("connection.php");
	if(isset($_GET['page']))
	{
		$pages = array("products","cart");
		if(in_array($_GET['page'],$pages))
		{
			$_page = $_GET['page'];
			
		}
		else
		{
			$_page = "products";
		}
	}
	else
	{
		$_page = "products";	
	}
?>
<html>
<head>
	<link href="js/bootstrap.min.js" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href = "style.css"/>
	<title>Shopping Cart</title>
</head>
<body>
	<table width="900" align="center" border="1">
  <tr>
    <td colspan="2"><?php require('header.php');?></td>
    </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33" align="center">Welcome <?php $_SESSION['admin'];?> <a href="logout.php"> | Logout</a></td>
    </tr>
  <tr>
    <td width="17" bgcolor="#FFCC33"><?php require('sideBar.php'); ?>
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
    <br/>
    <br/>
    </td>
    <td width="880">
    <div id = "container">
        <div id="main">
        
        	<?php require($_page.".php"); ?>
            
      </div><!--end of main-->
        
        <div id="sideBar">
        <h1>Items added to Cart</h1>
        <?php	
           if(isset($_SESSION['cart']))
		   {
				$sql = "SELECT * FROM products WHERE id_product IN(";
				foreach($_SESSION['cart'] as $id => $value)
		   		{
					$sql.=$id.",";
				}
				$sql = substr($sql, 0, -1).") ORDER BY name ASC";
				$query = mysql_query($sql);
				
				while($row = mysql_fetch_array($query))
				{
					?>
                    
                    <p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['id_product']]['quantity']; ?></p>
                    
                   <?php
					
				}
				
				?>
                <hr />
                <a href="product_cart.php?page=cart" class='form-1 btn btn-success'>Go to cart</a>
                <?php
		   }
		   else
		   {
			   echo 'The are no items in your cart. Please insert some items.';
		   }
        ?>
        </div><!--end of sidebar-->
</div><!--end of container--></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33"><?php require('footer.php'); ?></td>
    </tr>
</table>
</body>
</html>