<?php
    session_start();
    session_unset();
    session_destroy();
    echo json_encode(['status' => 'logged_out']);
    header("Location: index.php");
    exit();
?>