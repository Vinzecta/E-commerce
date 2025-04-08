<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../Web pages/index.php?user=account");
    exit();
?>