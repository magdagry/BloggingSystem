<?php include "../../Includes/db.php"; ?>
<?php session_start(); ?>

<?php

if(isset($_POST['login'])) {

    $password = "secret";
    $has_format = "$2y$10&";

    $salt = "iusesomecrazystrings22";

    echo strlen($salt);
    crypt($password);

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
    }

    $password = crypt($password, $db_user_password);

    if ($username === $db_username && $password === $db_user_password ) {

        $_SESSION['username'] = $db_username ; 
        $_SESSION['firstname'] = $db_user_firstname ; 
        $_SESSION['lastname'] = $db_user_lastname ; 
        $_SESSION['user_role'] = $db_user_role ; 

        header("Location: ../../admin/index.php"); 
        exit();

    } else {
        header("Location: ../index.php");
        exit();
    } 
}

    



?>