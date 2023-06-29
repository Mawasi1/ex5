<?php
include 'db.php';
$query = "SELECT * FROM tbl_36_books";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("DB query failed!");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Book library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <script src="includes/script.js"></script>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary " data-bs-theme="dark">
            <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./index.php">Home</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
    </header>
    <div class="container">
        <div class="upper-bound">
            <div class="container text-center">
                <div class="row">
                    <div class="col align-self-start text-start">
                        <h1>Books</h1>
                    </div>
                    <div class="col-2 align-self-end text-start mt-2">
                        <label for="books">Choose a category:</label>
                        <select id="cat" name="cat" class="form-select" aria-label="Default select example">
                           
                        </select>
                    </div>
                </div>
            </div>


        </div>
        <?php
        echo "<ul class='list-group list-group-horizontal flex-wrap p-3'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li class='".$row['cat'] . "'>";
            echo "<div class='d-inline-flex flex-wrap'>";
            echo "<a href='book.php?id=" . $row['book_id'] . "'>";
            echo "<img src='./images/" . $row['book_front_path'] . "' class='rounded float-start image-hover' alt='" . $row['book_name'] . "' />";
            echo "</a>";
            echo "</li>";
        }
        echo "</ul>";
        // echo "<li><h3>" . $row["book_name"] . "</h3>";
        // echo "<p>" . $row["book_description"] . "</p></li>";
        ?>
    </div>
		

</body>


</html>
<?php
mysqli_close($connection);
?>