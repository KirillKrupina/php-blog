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
            <h4 class="mt-5">Comments</h4>
            <form action="/templates/news.php?id=<?= $_GET['id'] ?>" method="POST">

                <label for="username" class="">Your name:</label>
                <input name="username" type="text" id="username" value="<?= $_COOKIE['login'] ?>"
                       class="form-control mb-2" placeholder="Your name">

                <label for="comment" class="">Comment:</label>
                <textarea name="comment" type="text" id="comment" class="form-control mb-4" placeholder="Your comment"
                          required=""></textarea>

                <button type="submit" class="btn btn btn-success" id="send_comment">Add a comment</button>
            </form>
            <?
            $db = new ArticleDB();
            if ($_POST['username'] != '' && $_POST['comment'] != '') {
                $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
                $commentText = trim(filter_var($_POST['comment'], FILTER_SANITIZE_STRING));
                try {
                    $db->addComment($username, $commentText, $id);
                } catch (Exception $e) {
                    echo 'Error: #' . $e;
                }
            }

            $comments = $db->getComments($id);

            foreach ($comments as $comment) {
                echo "<div class='alert alert-info mt-5'>
                        <h4>$comment->username</h4>
                        <p>$comment->comment</p>
                      </div>";
                }
            ?>
        </div>

        <? require 'blocks/aside.php' ?>

    </div>
</main>

<div style="margin-top: 40px">
    <? require 'blocks/footer.php' ?>
</div>
</body>

</html>
