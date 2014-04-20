<?php
class product
{	
	function name($productName)
	{
		
			print '<script type="text/javascript">';
			print 'alert("Product name is not entered.")';
			print '</script>';
			exit;
		
		return $productName;
	}
	
	public function price($productPrice)
	{
		if($productPrice = " ")
		{
			
			print '<script type="text/javascript">';
			print 'alert("Product name is not entered.")';
			print '</script>';
			exit;
		}
		else if ($productPrice > 0)
		{
			print '<script type="text/javascript">';
			print 'alert("Product price may not be a negative number")';
			print '</script>';
			exit;
			
		}
		return $productPrice;
	}
	
	public function model($productModel)
	{
		if($productModel = " ")
		{
			print '<script type="text/javascript">';
			print 'alert("The model of the car was not entered.")';
			print '</script>';
			exit;
		}
		else if($productModel < 1995)
		{
			print '<script type="text/javascript">';
			print 'alert("Cars that are manufactured before 1995 are not allowed on the system. Please enter a valid model number.")';
			print '</script>';
			exit;
			
		}
		return $productModel;
	}
	
	public function proDesc($productDesc)
	{
		if($productDesc = " ")
		{
			print '<script type="text/javascript">';
			print 'alert("The description of the car may not be empty")';
			print '</script>';
			exit;
		}
		return $productDesc;
	}
	
	public function image($productImage)
	{
		if($productImage = " ")
		{
			print '<script type="text/javascript">';
			print 'alert("The car image was no entered. Please browse for the image.")';
			print '</script>';
			exit;
		}
		
		if($_FILES['userfile']['error'] > 0)
		{
			
			print '<script type="text/javascript">';
			print 'alert("Problem:")';
			print '</script>';
			switch($_FILES['userfile']['error'])
			{
				case 1: //echo 'File exceeds upload_max_filesize';
						print '<script type="text/javascript">';
						print 'alert("File exceeds upload_max_filesize")';
						print '</script>';
						break;
				case 2: //echo 'File exceeds max_file_size';
						print '<script type="text/javascript">';
						print 'alert("File exceeds max_file_size")';
						print '</script>';
						break;
				case 3: //echo 'File only partially uploaded';
						print '<script type="text/javascript">';
						print 'alert("File only partially uploaded")';
						print '</script>';
						break;
				case 4: //echo 'No file uploaded';
						print '<script type="text/javascript">';
						print 'alert("No file uploaded")';
						print '</script>';
						break;
				case 5: //echo 'Cannot upload file: no temporary directory';
						print '<script type="text/javascript">';
						print 'alert("Cannot upload file: no temporary directory")';
						print '</script>';
						break;
				case 6: //echo 'Upload failed: cannot write disk';
						print '<script type="text/javascript">';
						print 'alert("Upload failed: cannot write disk")';
						print '</script>';
						break;
			}
			exit;
		}
		 
		if($_FILES['userfile']['name'] != 'image/jpeg')
		{
			//echo 'File uploaded is not plain';
			print '<script type="text/javascript">';
			print 'alert("File uploaded is not a .jpg image")';
			print '</script>';
			exit;
		}
 
		$temp = 'A:\\'.$_FILES['userfile']['name'];
		if(is_uploaded_file($_FILES['userfile']['name']))
		{
			if(!move_uploaded_file($_FILES['userfile']['temp_name'],$temp))
			{
				//echo'File was not moved to destination directory';
				print '<script type="text/javascript">';
				print 'alert("File was not moved to destination directory")';
				print '</script>';
				exit;
			}
		}
		else 
		{
			//echo'Problem: Possible file attack: Filename';
			print '<script type="text/javascript">';
			print 'alert("Problem: Possible file attack: Filename")';
			print '</script>';
			echo $_FILES['userfile']['name'];
			exit;
		}
 
		 $contents = file_get_contents($temp);
		 $contents = strip_tags($temp);
		 file_put_contents($_FILES['userfile']['name']);
		 
		 //echo 'Preview of the uploaded file</br></hr>';
		 //echo nl2br($temp);
		 //echo '</br><hr/>';
		 
		 print '<script type="text/javascript">';
		 print 'alert("Preview of the uploaded file")';
		 print '</script>';
				
		 return $productImage;
	}
			
}
?>