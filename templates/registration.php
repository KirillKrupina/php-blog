<!DOCTYPE html>
<html lang="en">

<head>
    <?
    $title = 'Registration';
    require 'blocks/head.php'
    ?>
</head>

<body class="">
    <? require 'blocks/header.php' ?>


    <form action="/app/registrationAction.php" method="post" class="form-signin" style=" max-width: 400px; margin: auto;">
        <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">Please sign up</h2>

        <label for="login" class="">Login:</label>
        <input name="login" type="text" id="login" class="form-control mb-2" placeholder="Login" required="" autofocus="">
        
        <label for="inputEmail" class="">Email address:</label>
        <input name="email" type="email" id="inputEmail" class="form-control mb-2" placeholder="Email address" required="" autofocus="">

        <label for="inputPassword" class="">Password:</label>
        <input name="password" type="password" id="inputPassword" class="form-control mb-4" placeholder="Password" required="">
        
        <button class="btn btn-lg btn-primary btn-block mb-3" type="submit">Sign up</button>
    </form>

</body>

</html>