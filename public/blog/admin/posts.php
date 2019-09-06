<?php

/*
include_once '../config.php';
$query = $pdo->prepare('SELECT * FROM  blog_post ORDER BY id DESC');
$query->execute();

$blogPosts = $query->fetchAll(PDO::FETCH_ASSOC);
*/
$jsonString = file_get_contents('../../js/data.json');

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
        <section id="main">
            <div class="row">
                <div class="col-md-12">
                    <h2>Blog Title</h2>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-8">
                <h2>Posts</h2>
                <a href="insert-post.php">New Post</a>
                    <table class="table">
                        <tr>
                            <th>Tilte</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        
                    <?php  foreach ($datas as $data) {?>
                            <tr>
                                <td> <?php echo $data["name"]; ?></td>
                                <td><a href="update.php?id=<?php echo $data['id'] ?>">Edit</a></td>
                                <td><a href="delete.php?id=<?php echo $data['id'] ?>">Delete</a></td>
                            <tr>
                     <?php } ?>
                        
                    </table>
                    
 
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
</body>
</html>