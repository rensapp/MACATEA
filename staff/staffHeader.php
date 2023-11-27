<?php 
$select_id= $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_id->execute([$staff_id]);
$fetch_id = $select_id->fetch(PDO::FETCH_ASSOC);
$staff_brNum = $fetch_id['branch_num'];

$select_notif = $conn->prepare("SELECT * FROM `notification` WHERE nbrId = $staff_brNum AND nStatus = 1");
$select_notif->execute();
$notif_num = $select_notif->rowCount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Page</title>
    <link rel="stylesheet" href="../staff/headerStyle.css">
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="container-fluid px-5 bg-dark">
    <nav class="navbar navbar-expand-sm navbar-dark py-3 px-4">
        <a
            href="#" 
            class="navbar-brand mb-0 fs-5 logo py-auto text-success fw-bold"
            style="display: flex; align-items: center;"
            data-aos="fade-right" data-aos-delay="100">
                <img 
                class="d-inline-block align-top me-2"
                data-aos="fade-right" data-aos-delay="50"
                src="../images/mactea.png"
                height="60" width="60" />
                Staff -
                <?php
                if($staff_brNum == 1){
                    echo 'San Antonio Branch';
                } elseif($staff_brNum == 2){
                    echo 'Luna Branch';
                } else {
                    echo 'Calendola Branch';
                }
                ?>
        </a>
        <button 
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            class="navbar-toggler"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div 
            class="collapse navbar-collapse" 
            id="navbarNav">
            <ul class="navbar-nav mx-auto w-50">
                <li class="nav-item active h5 "data-aos="fade-down" data-aos-delay="50">
                    <a href="staffHome.php" class="nav-link text-success fw-bold">Home</a>
                </li>
                <li class="nav-item active h5 "data-aos="fade-down" data-aos-delay="100">
                    <a href="staffOrders.php" class="nav-link text-success fw-bold">Orders</a>
                </li>
                <li class="nav-item active h5 "data-aos="fade-down" data-aos-delay="100">
                    <a href="staffPos.php?category=1" class="nav-link text-success fw-bold">POS</a>
                </li>
                <li class="nav-item active h5 "data-aos="fade-down" data-aos-delay="100">
                    <a href="sRewards.php" class="nav-link text-success fw-bold">Rewards</a>
                </li>
                <li class="nav-item active h5"data-aos="fade-down" data-aos-delay="100">
                    <a href="#" onclick="logout()" class="nav-link text-success fw-bold">Logout</a>
                </li>
            </ul>
        </div>
            <div class="icon ms-auto p-2" onclick="toggleNotifi()" id="notificationDiv">
                <img src="../images/bell.png" alt="" /> <span id="notificationCount"><?= $notif_num ?></span>
            </div>
            <div class="notifi-box" id="box" style="overflow: auto;">
                <h2 style="color: black;">Notifications <span class="text-danger fw-bold"><?= $notif_num ?></span></h2>
        <?php
        $select_notification = $conn->prepare("SELECT * FROM `notification` WHERE nbrId = $staff_brNum");
        $select_notification->execute();
        if($select_notification->rowCount() > 0){
            while($fetch_notification = $select_notification->fetch(PDO::FETCH_ASSOC)){ 
                $notif_num = $fetch_notification['notificationId']; ?>
                <a class="notifi-item" style="text-decoration: none;" href="updateNotificationStatus.php?id=<?= $notif_num ?>">
                    <div class="text">
                        <h4 class="ms-2" style="color: black;">You have notification </h4>
                        <p class="ms-4"><?= $fetch_notification['nMessage']; ?></p>
                    </div>
                </a>
        <?php }
        } else { ?>
            <div class="notifi-item">
                <div class="text">
                  <p class="empty fw-semibold h3 ms-2 text-dark">There are no notification</p>
                </div>
            </div>
       <?php }?>
            </div>
        <!-- </div> -->
    </nav>
</div>
    <script>
        function logout(){
            window.location.href="../login_page/login.php?logout='1'"
        }
    </script>
    <script src="../staff/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> 
   <script>
    function refreshNotification() {
        const staff_brNum = <?php echo $staff_brNum; ?>; // Replace with the actual staff_brNum value

        fetch('updateNotification.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `staff_brNum=${staff_brNum}`,
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('notificationCount').innerText = data;
        })
        .catch(error => console.error('Error updating notification:', error));
    }

    // Call the refreshNotification function every 5 seconds
    setInterval(refreshNotification, 5000); // Changed from 2000 to 5000 milliseconds
</script>


</body>
</html>