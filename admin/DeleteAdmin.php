<?php

include "db_conn.php";
$id=$_GET["id"];
mysqli_query($conn,"delete from users where id=$id");
echo '<script>alert("Data Deleted")</script>';
?>

<script type="text/javascript">
window.location="admin_list.php";
</script>