<table class="table table-bordered table-hover">
 <thead>
  <tr>
    <th>Id</th>
    <th>Username</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Role</th>
    <!-- <th>Date</th> -->
  </tr>
 </thead>

 <tbody>

    <?php   
                            
    $query = "SELECT * FROM users";
    $select_users = mysqli_query($conn, $query); 

    while($row = mysqli_fetch_assoc($select_users)) {
    $user_id = $row ['user_id'];
    $username = $row ['username'];
    $user_password = $row ['user_password'];
    $user_firstname = $row ['user_firstname'];
    $user_lastname = $row ['user_lastname'];
    $user_email = $row ['user_email'];
    // $user_image = $row ['user_image'];
    $user_role = $row ['user_role'];

    // echo $post_date =  $row ['post_date'];
    echo "<tr>";

    echo "<td>$user_id</td>";
    echo "<td>$username</td>";
    echo "<td>$user_firstname</td>";


    // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
    // $select_categories_id = mysqli_query($conn, $query); 

    // while($row =  mysqli_fetch_assoc($select_categories_id)) {
    // $cat_id =  $row ['cat_id'];
    // $cat_title =  $row ['cat_title'];


    // echo "<td>{$cat_title}</td>";
    // }

    echo "<td>$user_lastname</td>";
    echo "<td> $user_email </td>";
    echo "<td> $user_role</td>";

    $query = "SELECT * FROM users WHERE user_id = $user_id";
    $user_id_query = mysqli_query($conn, $query); 
    while($row = mysqli_fetch_assoc($user_id_query)){
    $user_id = $row['user_id'];
    $username = $row['username'];

    // echo "<td> <a href='/users.php?p_id=$user_id'>$username</a></td>";
    }

    echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
    echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
    echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
    echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
    echo "<tr>";
    }
                            
    ?>

    <!-- <td>10</td>
    <td>Magda</td>
    <td>Bootstrap framework</td>
    <td>Bootstrap</td>
    <td>Status</td>
    <td>Image</td>
    <td>Tags</td>
    <td>Comments</td>
    <td>Date</td> -->
                      
 </tbody>

</table>

<?php

if(isset($_GET['change_to_admin'])) {


$the_user_id = $_GET['change_to_admin'];

    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id ";
    $change_to_admin_query = mysqli_query($conn, $query);

    header("Location: users.php");
    exit;
}


if(isset($_GET['change_to_sub'])) {

$the_user_id = $_GET['change_to_sub'];

    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id ";
    $change_to_sub_query = mysqli_query($conn, $query);

    header("Location: users.php");
    exit;
}


if(isset($_GET['delete'])) {

$the_user_id = $_GET['delete'];

      $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
      $delete_query = mysqli_query($conn, $query);

      header("Location: users.php");
      exit;
  }
?>