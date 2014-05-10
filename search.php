<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<html>
<head>
<title>Car Distribution | Search</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body>
<table width="900" border="1" align="center">
  <tr>
    <td colspan="2"><?php require('header.php');?></td>
  </tr>
   <tr style="width:30">
    <td colspan="2" align="center" bgcolor="#FFCC33">
    <form action="search.php" method="post">
    <table width="483">
          <tr>
            <td width="252">Enter vehicle manufacturer</td>
            <td width="122"><label for="textfield"></label>
            <input type="text" name="searchField" id="textfield"></td>
            <td width="75" align="center"> <input type="submit" name="search" id="button" value="Search"></td>
          </tr>
          <?php
		  	if(isset($_POST['search']))
			{
				$name = strtolower($_POST['searchField']);
				require('connect.php');
						
				$query = "SELECT * FROM products WHERE pro_name like '$name'";
				$results = mysql_query($query);
		  ?>
	</table>
    </form>
    </td>
  </tr>
  
  <tr>
    <td width="17" bgcolor="#FFCC33"><?php require('sideBar.php') ?>
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
    <td width="867" style="padding:10px 10px 10px 10px">
		<?php
			if($results)
				{
					while($row = mysql_fetch_array($results))
					{
						echo'<img src=viewGallery.php?pro_id='.$row['pro_id'].' width=300 height=100/>';
						echo'</br>';
						echo'<hr color="#333333">';		
					}
				}
				else
				{
					echo 'Sorry: We dont have the car you want.';	
					exit;	
				}
			}
		?>
      </td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#FFCC33"><?php require('footer.php'); ?></td>
      </tr>
    </table>
</body>
</html>