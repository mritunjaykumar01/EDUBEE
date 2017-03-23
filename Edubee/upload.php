<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/session.php"); ?>
<?php require_once("./includes/functions.php"); ?>
<?php ini_set('max_execution_time',6); ?>
<html>
<head>
<title>Assignment </title>
<style>
#box
{
	width:100%;
	heigth:100px;
	border:solid #000 3px;
	border-radius:20px;
	padding:10px;
}
</style>
</head>
<body style="font-family:candara">
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo  "\n";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// // Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "c" && $imageFileType != "java" && $imageFileType != "py") {
    echo "Sorry, only C,java & python  files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded"."</br>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<?php 
    ini_set('max_execution_time', 2);
   if($imageFileType === "c"){
    //$testcases = {2,2,3,7,0};
    exec("cd /opt/lampp/htdoc/cs241/alan/uploads");
                            $link = "";
                            $time = array();
                            $link = get_input();
                            $result = "";
                            while ($row = $link->fetch_assoc()) {
                                $result .= $row['SIFile'];
                            }
                             $myfile = fopen("$result", 'r') or die("Unable to open file!");
                            // Output one line until end-of-file
                             $input = "";
                             $count=0;
                             $test_case = array();
                             $i=0;
                             $j=0;
                            while(!feof($myfile)) {
                              $sample_input = fgets($myfile);
                              //echo $sample_input . "<br>";
                              if($sample_input == "next\n" || $sample_input =="next"){
                                //echo $input."<br>";
                                exec('gcc '.$target_file.' -o question 2>error.txt',$out,$var);
                                print_r($out);
                                if($var == 1){
                                    //header('location:http://localhost/cs241/alan/course.html?q=0');
                                    //echo "compilation error";

                                    $link = "/opt/lampp/htdocs/cs241/alan/error.txt";
                                    //$link = get_output();
                                    $result = "";
                                    //$output = array();
                                    //$i=0;
                                    // while ($row = $link->fetch_assoc()) {
                                    //     $result .= $row['SOFile'];
                                    // }
                                     $myfile = fopen("$link", 'r') or die("Unable to open file!");
                                    // Output one line until end-of-file
                                
                                    while(!feof($myfile)) {
                                        echo fgets($myfile);
                                    }
                                    fclose($myfile);
                                    die("");

                                }else{
                                    $count++;
                                    $k=0;
                                    $value = "";
                                    while($input[$k] != " "){
                                        //$test_case[$i] .= $input[$k];
                                        $value .= $input[$k];
                                        $k++;
                                    }
                                    $test_case[$i] = $value;
                                    $i++;  
                                    $start = microtime(true);
                                    exec("echo '$input' | ./question",$ans,$var1);
                                    $end = microtime(true);
                                    $time[$j] = $end - $start;
                                    $j++;
                                }
                                $input = "";
                                continue;
                              }else

                                $input .= $sample_input. " ";
                            }
                            
                            fclose($myfile);
                            $link = "";
                            $link = get_output();
                            $result = "";
                            $output = array();
                            $i=0;
                            while ($row = $link->fetch_assoc()) {
                                $result .= $row['SOFile'];
                            }
                             $myfile = fopen("$result", 'r') or die("Unable to open file!");
                            // Output one line until end-of-file
                             $output = "";
                            while(!feof($myfile)) {
                                $sample_output = fgets($myfile);
                                if($sample_output == "next\n")
                                    continue;
                                else{

                                    $output[$i]= $sample_output;
                                    $i++;
                                }
                            }
                            fclose($myfile);
                            $flag = array();
                            $wrong_index = array();
                            $j=0;
                            $output = array_map('trim',$output);
                            $ans = array_map('trim',$ans);
                            for($i=0;$i<sizeof($output);$i++,$j++){
                                if($ans[$i] === $output[$i]){
                                    $wrong_index[$j] = 0;
                                }else{
                                    $wrong_index[$j] = 1;
                                    //$j++;
                                }
                            }
                            $wrong_index = array_map('trim',$wrong_index);
                            $test_case = array_map('trim',$test_case);
                            echo $count;
                            echo "<br>";
                            print_r($ans);
                            echo "<br>";
                            print_r($output);
                            echo "<br>";
                            print_r($test_case);
                            echo "<br>";
                            print_r($wrong_index);
                            echo "<br>";
                            $j=0;$i=0;
                            $sum = 0;
                            for($i=0;$i<sizeof($test_case);$i++){
                                $check = 0;
                                $sum = $sum + $test_case[$i];
                                for(;$j<$sum;){
                                    if($wrong_index[$j] == 0){
                                        $j++;
                                    }else{
                                        $check = 1;
                                        $j=$sum;
                                        break;
                                    }
                                }
                                if($check == 0){
                                    $flag[$i] = 1;    
                                }else{
                                    $flag[$i] = 0;
                                }                                
                            }
                            //print_r($flag);
    }
 ?> 
 <h1>Assignment Analytics</h1>
 
 <?php
 $i=0;
 for ($i=0;$i<sizeof($flag);$i++)
 {
	 if($flag[$i]=="1")
		 $color="rgb(0,255,0)";
	 else
		 $color="rgb(255,0,0)";
	 echo "<div id='box' style='background-color:".$color."'><h3>Testcase : ".$i."</h3><br>Time taken : ".$time[$i]."sec<br></div><br>";
 }
 ?>
 </body>
 </html>