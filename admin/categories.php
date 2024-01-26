<?php include "includes/admin_header.php"?>

    <div id="wrapper">



        <!-- Navigation -->
 <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>


                        <div class="col-xs-6">

                        <?php
    if (isset($_POST['submit'])) {
    // Pobierz wartość z pola formularza i zabezpiecz przed atakami SQL injection
    $cat_title = mysqli_real_escape_string($conn, $_POST['cat-title']);

    // Sprawdź, czy pole nie jest puste
    if ($cat_title == "" || empty($cat_title)) {
        echo "This field should not be empty";
    } else {
        // Utwórz zapytanie SQL z użyciem prepared statement
        $query = "INSERT INTO categories(cat_title) VALUES (?)";
        $stmt = mysqli_prepare($conn, $query);

        // Sprawdź, czy prepared statement zostało poprawnie utworzone
        if ($stmt) {
            // Zbinduj wartość do prepared statement
            mysqli_stmt_bind_param($stmt, "s", $cat_title);

            // Wykonaj prepared statement
            mysqli_stmt_execute($stmt);

            // Sprawdź, czy operacja się powiodła
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Category added successfully";
            } else {
                echo "Error adding category";
            }

            // Zamknij prepared statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Error in prepared statement: " . mysqli_error($conn);
        }
    }
}

?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat-title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                        </div>


                        <div class="col-xs-6">


                            <?php
                            $query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($conn, $query);  
                            ?> 

                           <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                               while($row =  mysqli_fetch_assoc($select_categories)) {
                                $cat_id =  $row ['cat_id'];
                                $cat_title =  $row ['cat_title'];
                                echo "<tr>";
                                echo "<td>{$cat_id}</td>";
                                echo "<td>{$cat_title}</td>";
                                echo "</tr>";
                                } ?>

                            </tbody>
                           </table>

                            
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


        <?php include "includes/admin_footer.php" ?>