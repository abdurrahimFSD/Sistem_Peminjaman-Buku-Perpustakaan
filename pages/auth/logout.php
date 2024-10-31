<?php
include('../../controllers/authController.php');
logout();
header("Location: signin.php");
exit();
?>