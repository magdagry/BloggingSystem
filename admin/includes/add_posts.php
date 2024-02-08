<?php 
 if(isset($_POST['create_post'])) { 

    $post_title = $_POST ['post_title'];
    $post_author = $_POST ['post_author'];
    $post_category_id = $_POST ['post_category_id'];
    $post_status = $_POST ['post_status'];

    $post_image = $_FILES ['image']['name'];
    $post_image_temp = $_FILES ['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date =  date('d-m-y');
    $post_comment_count = 4;


 move_uploaded_file($post_image_temp, "../images/$post_image");

 echo "Post image: $post_image<br>";

 $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";

 $query .= 
 "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}') ";
 
 echo "Query: $query<br>";

 $create_posts_query = mysqli_query($conn, $query);


 confirmQuery($create_posts_query);

 if ($create_posts_query && move_uploaded_file($post_image_temp, "../images/$post_image")) {
    echo "Post added successfully!";
} else {
    echo "Error adding post or uploading image: " . mysqli_error($conn);
}

 }
                         
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="post_title">
</div>
<div class="form-group">
    <label for="post_category">Post Category Id</label>
    <input type="text" class="form-control" name="post_category_id">
</div>
<div class="form-group">
    <label for="title">Post Author</label>
    <input type="text" class="form-control" name="post_author">
</div>
<div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" class="form-control" name="post_status">
</div>
<div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" class="form-control" name="image">
</div>
<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
</div>
<div class="form-group">
    <label for="title">Post Content</label>
   <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Publisch Post">
</div>

</form>


