<!DOCTYPE html>
<html lang="en">

<head>
    <?
    require_once '../app/ArticleDB.php';

    $id = $_GET['id'];

    $db = new ArticleDB();
    $query = $db->getArticleById($id);
    $article = $query->fetch(PDO::FETCH_OBJ);

    $title = $article->title;
    require 'blocks/head.php'
    ?>
</head>

<body>
<? require 'blocks/header.php' ?>


<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <div class="jumbotron">
                <h2><?= $article->title ?></h2>
                <p>
                    <b>Author: </b><?= $article->author ?>
                    <br>
                    <i><?= date("F d Y", $article->date); ?></i>
                </p>
                <p>
                    <?= $article->intro ?>
                    <br>
                    <br>
                    <?= $article->text ?>
                </p>

            </div>
        </div>

        <? require 'blocks/aside.php' ?>

    </div>
</main>


<? require 'blocks/footer.php' ?>

</body>

</html>
