<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Page</title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">
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
                Staff Page
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
            <ul class="navbar-nav ms-auto">
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
    </nav>
</div>
    <script>
        function logout(){
            window.location.href="../login_page/login.php?logout='1'"
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> 
</body>
</html>