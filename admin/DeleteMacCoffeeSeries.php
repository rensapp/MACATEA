<?php

include "db_conn.php";
$id=$_GET["id"];
mysqli_query($conn,"delete from product where id=$id");
echo '<script>alert("Data Deleted")</script>';
?>

<script type="text/javascript">
window.location="MacCoffeeSeries_list.php";
</script>