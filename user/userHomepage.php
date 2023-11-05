<?php include '../user/userHeader.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
		rel="stylesheet" 
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
		crossorigin="anonymous">
    <title>User Homepage</title>
</head>
<style>
    .ordnow{
        background-color: black;
        color: white;
        border: 1px solid black;
        position: absolute;
        top: 268px;
        right: 720px;
    }
    .ordnow:hover{
        background-color: white;
        color: black;

    }
</style>
<body class="d-flex flex-column min-vh-100 m-0">
    <div class="container-fluid" style="background-color: #7ED957;">
        <div class="row text-center">
            
        
                <button type="button" class="btn w-25 ordnow">ORDER NOW</button>
                <div>
                    <img src="../images/designHeader.png" width="100%" height="100%">
                </div>
        </div>
        <div class="row bg-success">
            <div class="col-12 p-0">
                <!-- <img src="https://picsum.photos/1910/500"> -->
                <img src="../images/macteaEdited.png" width="100%" height="100%">
            </div>            
        </div>
    </div>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
        crossorigin="anonymous">
</script>  
</body>
</html>