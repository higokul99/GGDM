<?php
session_start();
session_destroy();
header("Location: index.php");
//echo "<script>location.href='index.php'</script>";


?>