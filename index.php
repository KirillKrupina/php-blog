<!DOCTYPE html>
<html lang="en">

<head>
    <?
    $title = 'PHP Blog';
    require 'templates/blocks/head.php'
    ?>
</head>

<body>
    <? require 'templates/blocks/header.php' ?>


    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <?
                    require_once 'app/ArticleDB.php';
                    $db = new ArticleDB();
                    $query = $db->getArticles();
                    while ($row = $query->fetch(PDO::FETCH_OBJ)){
                        echo
                            "<h2>$row->title</h2>
                            <p>$row->intro</p>
                            <p><b>Author: </b><mark>$row->author</mark></p>
                            <a href='/templates/news.php?id=$row->id' title=$row->title
                                <button class='btn btn-warning mb-5'>More...</button>
                            </a>"
                        ;

                    }

                ?>
            </div>

            <? require 'templates/blocks/aside.php' ?>

        </div>
    </main>

    <? require 'templates/blocks/footer.php' ?>

</body>

</html>