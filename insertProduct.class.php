<?php
class insertProduct
{
	private $name;
	private $model;
	private $price;
	private $desc;
	
	public function name($name)
	{
			print '<script type="text/javascript">';
			print 'alert("Name was not entered")';
			print '</script>';
			exit;
	}
	
	public function model($model)
	{
		if($model <1995)
		{
			print '<script type="text/javascript">';
			print 'alert("Car model was not entered")';
			print '</script>';
			exit;
		}
		
	}
	
	public function price($price)
	{
			print '<script type="text/javascript">';
			print 'alert("Car price was not entered")';
			print '</script>';
			exit;
	}
	
	public function desc($desc)
	{
			print '<script type="text/javascript">';
			print 'alert("The description of the car was not entered")';
			print '</script>';
			exit;
	}
}
?>