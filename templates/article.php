<?
    if($_COOKIE['log'] == '') {
        header('Location: /registration.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?
    $title = 'Add article';
    require 'blocks/head.php';
    ?>
</head>

<body class="">
<? require 'blocks/header.php' ?>

<div>
    <form action="" method="" class="form-signin" style=" max-width: 800px; margin: auto;">

        <h2 class="h3 mb-3 font-weight-normal" >Add article</h2>

        <div class="alert alert-danger mb-2" id="errorBlock">
        </div>

        <div class="alert alert-success mb-2" id="successBlock">
        </div>

        <label for="title" class="">Article title:</label>
        <input name="title" type="text" id="title" class="form-control mb-2" placeholder="Article title"
               required=""
               autofocus="">

        <label for="intro" class="mt-2">Article intro:</label>
        <textarea name="intro" id="intro" class="form-control"></textarea>

        <label for="text" class="mt-2">Article text:</label>
        <textarea name="text" id="text" class="form-control"></textarea>

        <button class="btn btn-success mt-4" type="button" id="add_article">Add</button>
    </form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $('#add_article').click(() => {
        let title = $('#title').val();
        let intro = $('#intro').val();
        let text = $('#text').val();

        $.ajax({
            url: '/app/addArticleAction.php',
            type: 'POST',
            data: {
                'title': title,
                'intro': intro,
                'text': text,
            },
            dataType: 'html',
            success: function (data) {
                if (data === 'Success') {
                    let successBlock = $('#successBlock');
                    successBlock.show();
                    successBlock.text('Success');
                    setTimeout(() => {
                        window.location = '/'
                    }, 1500)
                } else {
                    let errorBlock = $('#errorBlock');
                    errorBlock.show();
                    errorBlock.text(data);
                    setTimeout(() => {
                        errorBlock.hide();
                    }, 3000)
                }
            }
        });
    });


</script>

</body>

</html>