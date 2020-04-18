<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">PHP Blog</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/">Main</a>
        <?
        if ($_COOKIE['login'] != ''):
        ?>
            <a class="p-2 text-dark" href="/templates/article.php">Add article </a>
        <?
        endif;
        ?>
    </nav>
    <?
    if ($_COOKIE['login'] == ''):
    ?>
        <a class="btn btn-success ml-2 mr-2 mb-1" href="/templates/auth.php">Sign in</a>
        <a class="btn btn-outline-primary mb-1" href="/templates/registration.php">Sign up</a>
    <?
    else:
    ?>
        <a class="btn btn-outline-primary mr-2 mb-1" href="/templates/auth.php">Your account</a>
        <a class="btn btn-danger mr-2 mb-1" style="color: white" id="exit_button">Exit</a>
    <?
    endif;
    ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $('#exit_button').click(()=>{
        $.ajax({
            url: '../app/exitAccountAction.php',
            type: 'POST',
            data: {},
            success: function (data) {
                document.location.reload();
            }
        })
    })
</script>