<?php
	error_reporting(E_ALL ^ E_NOTICE);
	$username = $_SESSION['user'];
	$email = $_SESSION['email'];
	

?>
<h1>CONFIRMING PRODUCT DELETE</h1>
<h5 style="color:#F00"><i><b>Please click the "DELETE" button to delete your items</b></i></h5>
<form action="deleteProduct.php?page=delete_product" method="post">

	<table>
        <?php
		if(isset($_POST['submit']))
		{
		
	
			$sql = "DELETE FROM products WHERE pro_id=$id";
				foreach($_SESSION['cart'] as $id => $value)
		   		{
					$sql.=$id.",";
				}
				$sql = substr($sql, 0, -1);
				$query = mysql_query($sql);
				$totalprice = 0.0;
				while(@$row = mysql_fetch_array($query))
				{
				
				
					print '<script type="text/javascript">';
					print 'alert("Product deleted successfully.")';
					print '</script>';
					exit;
				}
			}
		?>
        <tr>
          <td width="50%"><input class='form-control btn btn-success' name="submit" type="submit" value="Delete" size="10"/></td>
          <td></td>
        </tr>
    </table>
</form>

