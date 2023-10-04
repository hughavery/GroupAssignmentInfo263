<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Star Wars - Films</title>
</head>
<body>
<h1>Films</h1>

<?php
try {
    $open_review_s_db = new PDO("sqlite:resources/star_wars.db");
    $open_review_s_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}

try {
    $res = $open_review_s_db->query("SELECT filmID, film_title, film_release_date, image_url FROM film");
    while($row = $res->fetch(PDO::FETCH_ASSOC)) {
        echo $row['film_title'] . "<br />";
        echo "<a href='films.php?id=" . $row['filmID'] ."'><img height='300' src='" . $row['image_url'] . "' /></a><br />";
        echo $row['film_release_date'] . "<br /><br />";
    }
} catch (PDOException $e) {
    die($e->getMessage());
}
?>

</body>
</html>

