<table class="table table-bordered table-hover">
 <thead>
  <tr>
    <th>Id</th>
    <th>Username</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Role</th>
    <th>Date</th>
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

    echo "<td> <a href='/users.php?p_id=$user_id'>$username</a></td>";
    }

    echo "<td><a href='users.php?approve='>Approve</a></td>";
    echo "<td><a href='users.php?unapprove=''>Unapprove</a></td>";
    echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
    echo "./<tr>";
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

if(isset($_GET['approve'])) {

  echo "hallo";

$the_users_id = $_GET['approve'];

    $query = "UPDATE users SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";
    $approve_user_query = mysqli_query($conn, $query);

    header("Location: users.php");
    exit;
}


if(isset($_GET['unapprove'])) {

  echo "hallo";

$the_user_id = $_GET['unapprove'];

    $query = "UPDATE users SET comment_status = 'unapproved' WHERE user_id = $the_user_id ";
    $unapprove_user_query = mysqli_query($conn, $query);

    header("Location: users.php");
    exit;
}


if(isset($_GET['delete'])) {

    echo "hallo";

$the_user_id = $_GET['delete'];

      $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
      $delete_query = mysqli_query($conn, $query);

      header("Location: users.php");
      exit;
  }
?>