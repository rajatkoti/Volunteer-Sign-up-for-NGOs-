<?php
session_start();
session_unset();
session_destroy();
header("Location: /volunteer_sign_up/login.html");
?>