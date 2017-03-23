<?php 
	$target_file = 'abc.c';
	echo exec('gcc '.$target_file,$out,$var);
    exec('./a.out',$final,$var1);
    echo $var;
    if($var == 1){
        echo "compilation error";
    }else{
        print_r($final);
    }


 ?>