<?php
    include '../includes/config.php';
    session_start();
    $id = $_GET['id'];
    $points = 0;

    $update_points = $conn->prepare("UPDATE rewards SET points = :pts WHERE id = :id");
    $update_points->bindParam(':pts', $points);
    $update_points->bindParam(':id', $id);
    $update_points->execute();
?>

<script type="text/javascript">
    window.location="../staff/sRewards.php";
</script>
