<?php
include '../includes/config.php';

try {
    $staff_brNum = isset($_POST['staff_brNum']) ? $_POST['staff_brNum'] : null;

    // Validate and sanitize the input if necessary

    $select_notif = $conn->prepare("SELECT * FROM `notification` WHERE nbrId = :staff_brNum AND nStatus = 1");
    $select_notif->bindValue(':staff_brNum', $staff_brNum);
    $select_notif->execute();
    $notif_num = $select_notif->rowCount();

    echo $notif_num; // Output the updated notification count
} catch (PDOException $e) {
    echo "Error updating notification: " . $e->getMessage();
}
?>
