<?php

    $baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    $baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;
    define('BASE_URL', $baseUrl);

    $result = false;
    //echo $_GET['id'];
    $jsonString = file_get_contents('../../js/data.json');

    $datas = json_decode($jsonString, true);

    $i=0;
    foreach($datas as $data){ 

        if($data['id'] == $_GET['id']){
           
           $upData = $data;
           echo $upData["name"];
        } $i++; 
    }
    
if (!empty($_POST)) {

    $i=0;
    foreach($datas as $newdata){ 

        if($newdata['id'] == $_GET['id']){

            $datas[$i]['name'] = $_POST['textTitle'];
            $datas[$i]['datos'] = $_POST['content'];
            $datas[$i]['id'] = $newdata['id'];

        } $i++; 
    }

    $jsonData = json_encode($datas);
    file_put_contents('../../js/data.json', $jsonData);

    
    $result = true;
    header('Location:'. BASE_URL . 'posts.php');
}
    

    $jsonData = json_encode($datas);

    $_POST= '';

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>
<body>
    <div class="container">
        <h1>Blog Natural Love</h1>
        <header>
            <nav>
                <ul>
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                </ul>
            </nav>
        </header>
        <section id="main">
            <div class="row">
                <div class="col-md-12">
                    <h2>Blog Title</h2>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-8">
                    <h2>New Post</h2>
                    <p>
                        <a href="posts.php">Back</a>
                    </p>
                    <?php
                        if ($result) {
                            echo '<div class="success">Post Saved</div>';
                        }

                    ?>

                    <form method="post">
                        <div class="form-group">
                            <label for="textTitle">Title</label>
                            <input type="text" name="textTitle" id="textTitle" value=<?php 
                            echo '"';
                            echo $upData["name"]; 
                            echo '"';
                            ?>>
                        </div>
                        <textarea name="content" id="content" rows="5" class="form-control"><?php echo $upData["datos"]; ?></textarea>
                        
                        <input type="submit" value="Save">
                    </form>
                </div>
                <div class="col-md-4">
                    Sidebar
                </div>
            </div>

            <footer>
                <p>footer</p>
                <a href="index.php">Admin Panel</a>
            </footer>

        </section>


    </div>
    <script>
        //alert('hola');
    </script>
</body>
</html>