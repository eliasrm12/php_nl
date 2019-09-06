
<?php
/*
include_once 'config.php';
$query = $pdo->prepare('SELECT * FROM  blog_post ORDER BY id DESC');
$query->execute();

$blogPosts = $query->fetchAll(PDO::FETCH_ASSOC);
*/


$jsonString = file_get_contents('../js/data.json');

var_dump($jsonString);

$datas = json_decode($jsonString, true);

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

        <div>
            
        </div>

        <section id="main">
            <div class="row">
                <div class="col-md-12">
                    <h2>Blog Title</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <?php
                        foreach($datas as $data){
                            echo '<div class="blog-post">';
                            echo '<h2>'. $data['name'] .'</h2>';
                            echo '<p>Jan 1, 2020 by <a href="">Elias</a></p>';
                            echo '<div class="blog-post-image">';
                            echo '<img src="images/img.png" alt="">';
                            echo '</div>';
                            echo '<div class="blog-post-content">';
                            echo $data['datos'];
                            echo '</div>';
                            echo '</div>';
                        }
                    ?>
                    <div class="blog-post">
                        <h2>Sample title</h2>
                        <p>Jan 1, 2020 by <a href="">Elias</a></p>
                        <div class="blog-post-image">
                            <img src="" alt="">
                        </div>
                        <div class="blog-post-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, culpa saepe repellendus natus ipsa sapiente quo perspiciatis, dolores error veniam molestiae esse doloremque blanditiis nostrum dolorem nam sit quos maiores.
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    Sidebar
                </div>
            </div>

            <footer>
                <p>footer</p>
                <a href="admin/index.php">Admin Panel</a>
            </footer>

        </section>


    </div>
</body>
</html>