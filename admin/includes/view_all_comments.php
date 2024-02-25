<table class="table table-bordered table-hover">
 <thead>
  <tr>
    <th>Id</th>
    <th>Author</th>
    <th>Comment</th>
    <th>Email</th>
    <th>Status</th>
    <th>In Response to</th>
    <th>Date</th>
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
    $comment_podst_id =  $row ['comment_podst_id'];
    $comment_author =  $row ['comment_author'];
    $comment_email=  $row ['comment_email'];
    $comment_content =  $row ['comment_content'];
    $comment_status =  $row ['comment_status'];
    $comment_date =  $row ['comment_date'];
    $post_comment_count =  $row ['post_comment_count'];

    echo $post_date =  $row ['post_date'];
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
    echo "<td> Some Title</td>";
    echo "<td>$comment_date</td>";
    echo "<td><a href='posts.php?source=edit_post&p_id='>Approve</a></td>";
    echo "<td><a href='posts.php?delete='>Unapprove</a></td>";
    echo "<td><a href='posts.php?delete='>Delete</a></td>";
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
if(isset($_GET['delete'])) {

    echo "hallo";

$the_post_id = $_GET['delete'];

      $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
      $delete_query = mysqli_query($conn, $query);

      header("Location: posts.php");
      exit;
  }
?>