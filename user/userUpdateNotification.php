<?php
include '../includes/config.php';

try {
    $user_brNum = isset($_POST['user_brNum']) ? $_POST['user_brNum'] : null;

    // Validate and sanitize the input if necessary

    $select_notif = $conn->prepare("SELECT * FROM `notification` WHERE ncId = :user_brNum AND nStatus = 1");
    $select_notif->bindValue(':user_brNum', $user_brNum);
    $select_notif->execute();
    $notif_num = $select_notif->rowCount();

    echo $notif_num; // Output the updated notification count
} catch (PDOException $e) {
    echo "Error updating notification: " . $e->getMessage();
}
?>
