<?php

setcookie('login', '', time() - 3600, "/");
unset($_COOKIE['login']);