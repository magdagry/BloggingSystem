<?php

function confirm($result) {
    global $conn;

    if(!$result){
        die("QUERY FAILED ." . mysqli_error($conn));
     }
}

function insert_categories() {

    global $conn;

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
}

function findAllCategories() {
      global $conn;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($conn, $query); 

    while($row =  mysqli_fetch_assoc($select_categories)) {
    $cat_id =  $row ['cat_id'];
    $cat_title =  $row ['cat_title'];
    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>";
    } 
}
 
function delete_categories() {
    global $conn;
    
    if (isset($_GET['delete'])) {
        $the_cat_id =  $_GET ['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_query = mysqli_query($conn, $query);
        header("Location: categories.php");
    }
}

?>