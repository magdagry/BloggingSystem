<?php include "../../Includes/db.php"?>

<?php

if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);


    $query = "SELECT * FROM Users WHERE username = '{$username}'";
    
    $select_user_query = mysqli_query($conn, $query);

    if(!$select_user_query) {

        die("QUERY FAILED". mysqli_error($conn));
    }

    while($row = mysqli_fetch_array($select_user_query)) {
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];

        echo $db_username;
    }

    if($username !== $db_username && $password !== $db_user_password ) {
        header("Location: ../index.php ");
        exit;
    }
}


?>