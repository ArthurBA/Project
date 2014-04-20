<?php
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
<br/>
<br/>
<form action="product_cart.php?page=cart" method="post">

	<table>
    	<tr>
        	<th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Items Price</th>
        </tr>
        <?php
		
			$sql = "SELECT * FROM products WHERE id_product IN(";
				foreach($_SESSION['cart'] as $id => $value)
		   		{
					$sql.=$id.",";
				}
				$sql = substr($sql, 0, -1).") ORDER BY name ASC";
				$query = mysql_query($sql);
				$totalprice = 0.0;
				while($row = mysql_fetch_array($query))
				{
					$subtotal = $_SESSION['cart'][$row['id_product']]['quantity']*$row['price'];
					$totalprice += $subtotal;
					?>
                    	<tr>
                        	<td> <?php echo $row['name'] ?></td>
                            <td> <input class='form-control' name="quantity[<?php echo $row['id_product'] ?>]" type="text" size="4" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>"/></td>
                            <td> <?php echo "R".$row['price'] ?></td>
                            <td> <?php echo "R".$_SESSION['cart'][$row['id_product']]['quantity']*$row['price'] ?></td>
                        </tr>
                    
                   <?php
					
				}
		
		?>
        
        <tr>
        	<td style="color:#F00">Total Price: <?php echo "R".$totalprice ?> </td>
        </tr>
        
    </table>
	<br/>
    <input class='form-control btn btn-success' name="submit" type="submit" value="Update Cart" size="10"/>
</form>
<p style="color:#F00">To remove an item, set it's quantity to 0</p>