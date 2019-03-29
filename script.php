
<?php
$servername = "localhost";
$username = "root";
$password = "!prudenceconso";
$dbname = "prudenceconso";
$string = file_get_contents("test.json");
$json_a = json_decode($string, true);

foreach ($json_a as $key => $val) {
    if($key=='features'){
        foreach ($val as $val2) {
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                switch ($val2['properties']['apet700']) {
                    case '8621Z':
                        $typeProfession="1";
                    break;
                    case '8623Z':
                        $typeProfession="2";
                    break;
                    case '8690F':
                        $typeProfession="5";
                    break;

                    default:
                        $typeProfession="4"
                    break;
                }


                $siret=$val2['properties']['siret'];
                $denomination="null";
                $sign="null";
                $completeName=$val2['properties']['l1_normalisee'];
                $bpos=$val2['properties']['depet'];
                $comp=$val2['properties']['l4_declaree'];
                $lcom=$val2['properties']['l6_normalisee'];
                $cpos=$val2['properties']['codpos'];
                $bdis="null";
                $stet="null";
                $fjur=$val2['properties']['categorie'];
                $apet=$val2['properties']['apet700'];
                $libape="null";
                $activity=$val2['properties']['l2_normalisee'];
                $codeActivity="null";
                $treff="null";
                $workforce="null";
                $phone="null";
                $tlcop="null";
                $email="null";
                $title="null";
                $lastNameDir=$val2['properties']['nom'];
                $firstNameDir=$val2['properties']['prenom'];
                $latitude=$val2['geometry']['latitude'];
                $longitude=$val2['geometry']['longitude'];
                $agglomeration="null";



                $sql = "insert into enterprises(typeProfession,siret,denomination,sign,completeName,bpos,comp,lcom,cpos,bdis,stet,fjur,apet,libape,activity,codeActivity,treff,workforce,phone,tlcop,email,title,lastNameDir,firstNameDir,latitude,longitude,agglomeration)
                values ('$typeProfession','$siret','$denomination','$sign','$completeName','$bpos','$comp','$lcom','$cpos','$bdis','$stet','$fjur','$apet','$libape','$activity',$codeActivity,'$treff',$workforce,$phone,$tlcop,'$email','$title','$lastNameDir','$firstNameDir','$latitude','$longitude',$agglomeration)";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "New record created successfully";
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }

            $conn = null;
        }
    }
}


?>
