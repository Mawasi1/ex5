<?php
include 'db.php';
$bookId = $_GET["id"];
$query = "SELECT * FROM tbl_36_books WHERE book_id =" . $bookId;
$result = mysqli_query($connection, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
}
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
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="style/style.css">
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
        <h1>
            <?php echo "<h1>" . $row["book_name"] . "</h1>"; ?>
        </h1>
        

        <?php
        echo "<div class='d-inline-flex flex-wrap'>";
        echo "<img src='./images/" . $row['book_front_path'] . "' class='rounded float-start image-hover image-overlay' id='myImage' onclick='changeImage()' alt='" . $row['book_name'] . "' />";
        echo "<ul>";
        echo "<li><h3>Description: </h3>";
        echo "<p>" . $row["book_description"] . "</p></li>";
        echo "<li><h3>Price: " . $row["book_price"] . "$</h3></li>";
        echo "</ul>";
        ?>

    </div>
    

    <script>
        function changeImage() {
            var img = document.getElementById("myImage");
            var originalSrc = img.src;

            if (originalSrc.includes("front")) {
                var newSrc = originalSrc.replace("front", "back");
            } else {
                var newSrc = originalSrc.replace("back", "front");
            }

            img.src = newSrc;
        }


    </script>
</body>

</html>

<?php
mysqli_close($connection);
?>