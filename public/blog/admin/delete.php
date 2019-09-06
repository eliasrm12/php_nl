<?php


    $baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    $baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;
    define('BASE_URL', $baseUrl);
    //echo $_GET['id'];
    $jsonString = file_get_contents('../../js/data.json');

    $datas = json_decode($jsonString, true);
    
    //echo $datas[0]['name'];
    $i=0;
    foreach($datas as $data){ 
        
        //echo $data['name'];

        if($data['id'] == $_GET['id']){
           
           unset($datas[$i]);
        } $i++; 
    }
    $jsonData = json_encode($datas);
    file_put_contents('../../js/data.json', $jsonData);

    header('Location:'. BASE_URL . 'posts.php');

?>