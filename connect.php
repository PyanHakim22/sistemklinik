<?php
    $conn=mysqli_connect('localhost','root','','klinik');
    if(!$conn)
    {
        die(mysqli_error($conn));
    }
?>