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
                Main part
            </div>

            <? require 'templates/blocks/aside.php' ?>

        </div>
    </main>

    <? require 'templates/blocks/footer.php' ?>

</body>

</html>