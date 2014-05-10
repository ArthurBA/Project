<?php
	error_reporting(E_ALL ^ E_NOTICE);
	$username = $_SESSION['user'];
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
<a href="product_cart.php?page=products">Go back to product page</a>
<form action="product_cart.php?page=cart" method="post">

	<table>
    	<tr>
        	<th>Product Name</th>
            <th>Product Quantity</th>
            <th>Product Price</th>
            <th>Items Price</th>
        </tr>
        <?php
		
			$sql = "SELECT * FROM products WHERE pro_id IN(";
				foreach($_SESSION['cart'] as $id => $value)
		   		{
					$sql.=$id.",";
				}
				$sql = substr($sql, 0, -1).") ORDER BY pro_name ASC";
				$query = mysql_query($sql);
				$totalprice = 0.0;
				while($row = mysql_fetch_array($query))
				{
					$subtotal = $_SESSION['cart'][$row['pro_id']]['quantity']*$row['pro_price'];
					$totalprice += $subtotal;
					$quant = $_SESSION['cart'][$row['pro_id']]['quantity'];
					$orderName = $row['pro_name'];
					$refNum = $row['pro_refNum'];
					?>
                    	<tr>
                        	<td> <?php echo $row['pro_name'] ?></td>
                            <td> <input class='form-control' name="quantity[<?php echo $row['pro_id'] ?>]" type="text" size="4" value="<?php echo $_SESSION['cart'][$row['pro_id']]['quantity'] ?>"/></td>
                            <td> <?php echo "R".$row['pro_price'] ?></td>
                            <td> <?php echo "R".$_SESSION['cart'][$row['pro_id']]['quantity']*$row['pro_price'] ?></td>
                        </tr>
                    	
                   <?php
					
				}
		
		?>
        <?php
        	if(isset($_POST['submitOrder']))
			{
					
				$insertQuery = "INSERT INTO cust_order VALUES(null,'".$email."','".$refNum."','".$quant."','".$totalprice."')";
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
    	<td><input class='form-control btn btn-success' name="submit" type="submit" value="Update Cart" size="10"/></td>
        <td><input class='form-control btn btn-success' name="submitOrder" type="submit" value="Submit Order" size="10"/></td>
        </tr>
    </table>
    <i style="color:#F00">Enter 0(zero) on the product quantity to remove or update quality</i>
</form>

