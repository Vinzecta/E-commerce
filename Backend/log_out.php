<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../Web pages/index.php?page=account");
    exit();
?>