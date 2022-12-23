<?php
    ob_start();
    $connect = mysqli_connect('localhost', 'root', '', 'lr_2');

    if (!$connect) {
        die('Error connect to DB');
    }
