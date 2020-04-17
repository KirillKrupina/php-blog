<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP BLOG</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
</head>

<body>
    <? require 'blocks/header.php' ?>


    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                Main part
            </div>

            <? require 'blocks/aside.php' ?>
        </div>
    </main>

    <? require 'blocks/footer.php' ?>

</body>

</html>