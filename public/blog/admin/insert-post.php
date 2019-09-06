<?php

$result = false;

$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl);


if (!empty($_POST)) {
    $jsonString = file_get_contents('../../js/data.json');

    $id = getCode(6);

    $datas = json_decode($jsonString, true);

    $newData = ["id" => $id, "name" => $_POST['title'], "img" => "img/img1.jpg", "datos" => $_POST['content']];

    array_push($datas, $newData);
    $jsonData = json_encode($datas);
    file_put_contents('../../js/data.json', $jsonData);
    echo $jsonData;
    
    $result = true;
    $_POST= '';
    header('Location:'. BASE_URL . 'posts.php');
}

function getCode($long) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $long;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
   }

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


                    <form action="insert-post.php" method="post">
                        <div class="form-group">
                            <label for="inputTitle">Title</label>
                            <input type="text" name="title" id="inputTitle">
                        </div>
                        <textarea name="content" id="inputContent" rows="5" class="form-control"></textarea>
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