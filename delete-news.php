<?php
require 'db.php';

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
    $stmt->bind_param("i" , $id);

    if($stmt->execute()){
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Gabim gjate fshirjes se lajmit.";
    }

    $stmt->close();
} else {
    echo "ID e lajmit nuk eshte dhene";
}

?>