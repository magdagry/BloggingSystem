<table class="table table-bordered table-hover">
 <thead>
  <tr>
    <th>Id</th>
    <th>Username</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Image</th>
    <th>Role</th>
    <th>Approve</th>
    <th>Unapprove</th>
    <th>Delete</th>
  </tr>
 </thead>

 <tbody>

    <?php   
                            
    $query = "SELECT * FROM comments";
    $select_comments = mysqli_query($conn, $query); 

    while($row =  mysqli_fetch_assoc($select_comments)) {
    $comment_id =  $row ['comment_id'];
    $comment_post_id =  $row ['comment_post_id'];
    $comment_author =  $row ['comment_author'];
    $comment_email=  $row ['comment_email'];
    $comment_content =  $row ['comment_content'];
    $comment_status =  $row ['comment_status'];
    $comment_date =  $row ['comment_date'];
    // $post_comment_count =  $row ['post_comment_count'];

    // echo $post_date =  $row ['post_date'];
    echo "<tr>";

    echo "<td> $comment_id </td>";
    echo "<td> $comment_author</td>";
    echo "<td> $comment_content</td>";


    // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
    // $select_categories_id = mysqli_query($conn, $query); 

    // while($row =  mysqli_fetch_assoc($select_categories_id)) {
    // $cat_id =  $row ['cat_id'];
    // $cat_title =  $row ['cat_title'];


    // echo "<td>{$cat_title}</td>";
    // }

    echo "<td> $comment_email</td>";
    echo "<td> $comment_status</td>";

    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
    $comment_post_id_query = mysqli_query($conn, $query); 
    while($row = mysqli_fetch_assoc($comment_post_id_query)){
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];

    echo "<td> <a href='/post.php?p_id=$post_id'>$post_title</a></td>";
    }

    // echo "<td> $post_title </td>";

    echo "<td>$comment_date</td>";
    echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
    echo "<td><a href='comments.php?unapprove=$comment_id''>Unapprove</a></td>";
    echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
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

$the_comment_id = $_GET['approve'];

    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";
    $approve_comment_query = mysqli_query($conn, $query);

    header("Location: comments.php");
    exit;
}


if(isset($_GET['unapprove'])) {

  echo "hallo";

$the_comment_id = $_GET['unapprove'];

    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
    $unapprove_comment_query = mysqli_query($conn, $query);

    header("Location: comments.php");
    exit;
}


if(isset($_GET['delete'])) {

    echo "hallo";

$the_comment_id = $_GET['delete'];

      $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
      $delete_query = mysqli_query($conn, $query);

      header("Location: comments.php");
      exit;
  }
?>