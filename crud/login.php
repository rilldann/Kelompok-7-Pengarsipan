<?php
//print_r($_POST);

if (!isset($_SESSION)) {

    session_start();
}

if(isset($_POST['nim'])!==null)
 {
    $nim 		= $_POST['nim'];
	$nama 	    = $_POST['nama'];

    $cek        = 0;
    $path       = '../config/config.txt'; 
    $user       = $nim. (str_replace(' ', '', $nama));

    $file = fopen($path, 'r') or die("can't open file");

    while(!feof($file)){
        $line = fgets($file);
        list($u) = explode(" ", $line);
        if(trim($u) == trim($user)){
            //echo trim ($u);
            $cek++;
            break;
        }
    }
    fclose($file);

    if($cek > 0)
    {   
        $_SESSION['admin'] =  $nim;
        $_SESSION['nama'] =   $nama;
        $data="OK";
        echo $data;
    } else
    {
        $data="ERROR";
        echo $data;
    } 

 }
?>