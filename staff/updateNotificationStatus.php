<?php
    include '../includes/config.php';
    session_start();
    $id = $_GET['id'];
    $stat = 0;

    $update_notif_status = $conn->prepare("UPDATE notification SET nStatus = :n_stat WHERE notificationId = :id");
    $update_notif_status->bindParam(':n_stat', $stat);
    $update_notif_status->bindParam(':id', $id);
    $update_notif_status->execute();
?>

<script type="text/javascript">
    window.location="../staff/staffOrderPending.php";
</script>