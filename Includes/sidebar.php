<div class="col-md-4">

<?php
//echo $_POST['search'];

if(isset($_POST['submit'])) {
    $search = $_POST['search'];

    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
    $search_query = mysqli_query($conn, $query);

    if(!$search_query) {
        die ("QUERY FAILED" . mysqli_error($conn));
    }

    $count = mysqli_num_rows($search_query);
    if($count == 0) {
        echo "<h1> NO RESULT</h1>"; 
    } else {
     echo "some result";
    }
}
?>

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">

                <?php
                $query = "SELECT * FROM categories";
                $select_all_categories_sidebar = mysqli_query($conn, $query);
                ?> 
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                            <?php
                             while($row =  mysqli_fetch_assoc($select_all_categories_sidebar)) {
                                $cat_title =  $row ['cat_title'];

                                echo "<li><a href='#'>{$cat_title}</a></li>";
                                
                            } ?>
                
                            </ul>
                        </div>

                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
             
                <?php include "widget.php"; ?>
             

            </div>





            <?php 
                                
                                //EDIT QUERY Edytowanie wierszy w bazie danych
                                // if (isset($_GET['edit'])) {
                                //     $cat_id =  $_GET ['edit'];
                                    
                                //     include "includes/admin_header.php"
                            
                                //     }
            
                                ?>