<?php
//print_r($_POST);
if(isset($_POST['nim'])!==null)
 {
    $nim 		= $_POST['nim'];
	  $nama    = $_POST['nama'];

	//path to save txt file
  $data= $nim. (str_replace(' ', '', $nama));
	$myFile = "../config/config.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
  //file_put_contents($myFile, $data. "\n", FILE_APPEND);
  fwrite($fh, $data."\n");
  fclose($fh);
    
    $data="OK"; 
    echo $data;
  } else
    {
    $data="ERROR";
    echo $data;
    }
?>