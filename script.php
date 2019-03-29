<?php
$servername = "localhost";
$username = "root";
$password = "!prudenceconso";
$dbname = "prudenceconso";

try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $string = file_get_contents("test.json");
   $json_a = json_decode($string, true);
   $typeProfession="";
   $siret="";
   $denomination=null;
   $sign=null;
   $completeName="";
   $bpos="";
   $comp="";
   $com="";
   $cpos="";
   $bdis=null;
   $stet=null;
   $fjur="";
   $apet="";
   $libape=null;
   $activity="";
   $codeActivity=null;
   $treff=null;
   $workforce=null;
   $phone=null;
   $tlcop=null;
   $email=null;
   $title=null;
   $lastNameDir="";
   $firstNameDir="";
   $latitude="";
   $longitude="";
   $agglomeration=null;



   $sql = "insert into enterprises(typeProfession,siret,denomination,sign,completeName,bpos,comp,lcom,cpos,bdis,stet,fjur,apet,libape,activity,codeActivity,treff,workforce,phone,tlcop,email,title,lastNameDir,firstNameDir,latitude,longitude,agglomeration)
   values ($typeProfession,$siret,$denomination,$sign,$completeName,$bpos,$comp,$lcom,$cpos,$bdis,$stet,$fjur,$apet,$libape,$activity,$codeActivity,$treff,$workforce,$phone,$tlcop,$$email,$title,$lastNameDir,$firstNameDir,$latitude,$longitude,$agglomeration);"
   // use exec() because no results are returned
   $conn->exec($sql);
   echo "New record created successfully";
   }
catch(PDOException $e)
   {
   echo $sql . "<br>" . $e->getMessage();
   }

$conn = null;
?>
