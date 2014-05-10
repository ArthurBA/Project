<?php
	error_reporting(E_ALL ^ E_NOTICE);
	$username = $_SESSION['username'];
	if(!$username)
	{	
		echo "Section has expired";
		header("Location: index.php");
		exit;
	}
	$email = $_SESSION['email'];
	if(isset($_POST['submit']))
	{
		foreach($_POST['quantity'] as $key => $val)
		{
			if($val == 0)
			{
				unset($_SESSION['cart'][$key]);
			}
			else
			{
				$_SESSION['cart'][$key]['quantity'] = $val;
			}
		}
	}

?>
<h1>VIEW CART</h1>
<a href="viewOrder.php?page=view_order">Go back to product page</a>
<form action="viewOrder.php?page=ciew" method="post">

	<table>
    	<tr>
        	<th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Items Price</th>
        </tr>
        <?php
		
			$sql = "SELECT * FROM order WHERE order_id IN(";
				foreach($_SESSION['cart'] as $id => $value)
		   		{
					$sql.=$id.",";
				}
				$sql = substr($sql, 0, -1).") ORDER BY order ASC";
				$query = mysql_query($sql);
				$totalprice = 0.0;
				while($row = mysql_fetch_array($query))
				{
					$subtotal = $_SESSION['cart'][$row['order_id']]['quantity']*$row['pro_price'];
					$totalprice += $subtotal;
					$quant = $_SESSION['cart'][$row['pro_id']]['quantity'];
					$orderName = $row['pro_name'];
					?>
                    	<tr>
                        	<td> <?php echo $row['order_id'] ?></td>
                            <td> <?php echo $row['cust_email'] ?></td>
                            <td> <?php echo "R".$row['quantity'] ?></td>
                            <td> <?php echo "R".$row['order_id'] ?></td>
                        </tr>
                    	
                   <?php
					
				}
		
		?>
        <?php
        	if(isset($_POST['submitOrder']))
			{
				
				$insertQuery = "INSERT INTO order VALUES(null,'".$email."','".$orderName."','".$quant."','".$totalprice."')";
				$insertOrder = mysql_query($insertQuery);
				
				if(!$insertOrder)
				{
					$Message = "Database is not connected.";
					echo '<p style="color:#0F0">'.$Message.'</p>';
					exit;
				}
				else
				{
					$Message = "Successfully Ordered";
					echo '<p style="color:#0F0">'.$Message.'</p>';
					exit;
				}
			}
		
		?>
        <tr>
        	<td style="color:#F00">Total Price: <?php echo "R".$totalprice ?> </td>
        </tr>
        
    </table>
    <table>
    	<tr>
    	<td><input class='form-control btn btn-success' name="submit" type="submit" value="Respond to Order" size="10"/></td>
        </tr>
    </table>
    <i style="color:#F00">To remove an item, set it's quantity to 0</i>
</form>

