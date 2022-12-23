<?php
    require_once 'connect.php';

    $post = $_POST['post'];
    $login = $_POST['login'];
    $date = date(" H : i : s d - m - Y ");
    $rwr = mysqli_query($connect, "INSERT INTO `post`(`id`, `login`, `text`, `dtime`) VALUES(NULL, '$login', '".addslashes($post)."', '$date')");
    //mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `email`, `password`,`secret_word`) VALUES (NULL, '$login', '$email', '$password_hsh','$secret_word_hsh')");
    if(!($rwr)){
      echo "cyка";
    }
    header('Location: index.php');
    //echo "<script> window.location.href='index.php';</script>";
 ?>
