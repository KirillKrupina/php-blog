<!DOCTYPE html>
<html lang="en">

<head>
    <?
    $title = 'Registration';
    require 'blocks/head.php';
    ?>
</head>

<body class="">
<? require 'blocks/header.php' ?>


<form action="" method="" class="form-signin" style=" max-width: 400px; margin: auto;">
    <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">Sign up</h2>

    <div class="alert alert-danger mb-2" id="errorBlock">
    </div>

    <div class="alert alert-success mb-2" id="successBlock">
    </div>

    <label for="login" class="">Login:</label>
    <input name="login" type="text" id="login" class="form-control mb-2" placeholder="Login" required="" autofocus="">

    <label for="inputEmail" class="">Email address:</label>
    <input name="email" type="email" id="email" class="form-control mb-2" placeholder="Email address" required=""
           autofocus="">

    <label for="inputPassword" class="">Password:</label>
    <input name="password" type="password" id="password" class="form-control mb-4" placeholder="Password" required="">

    <button class="btn btn-lg btn-primary btn-block mb-3" type="button" id="reg_user">Sign up</button>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $('#reg_user').click(() => {
        let login = $('#login').val();
        let email = $('#email').val();
        let password = $('#password').val();

        $.ajax({
            url: '/app/registrationAction.php',
            type: 'POST',
            data: {
                'login': login,
                'email': email,
                'password': password
            },
            dataType: 'html',
            success: function (data) {
                if (data === 'Success') {
                    let successBlock = $('#successBlock');
                    successBlock.show();
                    successBlock.text(data);
                    setTimeout(() => {
                        window.location = '/';
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
    })
</script>

</body>

</html>