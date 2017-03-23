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
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded and output is as follows"."</br>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<?php 
   if($imageFileType === "c"){
    //$testcases = {2,2,3,7,0};
    exec("cd /opt/lampp/htdoc/cs241/alan/uploads");
    exec('gcc '.$target_file.' -o abc',$out,$var);
    exec("cd ..");
    exec('./abc 2 2 3 7 0',$final,$var1);
    if($var == 1){
        echo "compilation error";
    }else{
        print_r($final);
    }
   }
    if($imageFileType === "java"){
    exec("cd /opt/lampp/htdoc/uploads");    
    exec('javac '.$target_file,$out,$var);
    exec("java Solution",$final,$var1);
    if($var == 1){
        echo "compilation error";
    }else{
        echo "<pre>$fianl</pre>";
    }
   }
    if($imageFileType === "py"){
    exec("cd /opt/lampp/htdoc/uploads");    
    echo exec('python '.$target_file,$out,$var);
    if($var == 1){
        echo "compilation error";
    }else{
        print_r($out);
    }
   }

 ?> 