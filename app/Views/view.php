<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giphy page</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arvo:wght@400;700&display=swap">
</head>
<body>
<h1>GIFINATOR</h1>
<form action="" method="GET">
    <label for="keyWord">Enter keyword to search GIFS:</label>
    <input class="input" id="keyWord" type="text" name="keyWord" maxlength="50"/><br>
    <label for="amount">How many GIFS to display? (up to 25)</label>
    <input class="input" id="amount" type="number" name="amount" max="25" min="1"/><br>
    <input type="hidden" name="search_submitted" value="1"/>
    <input class="searchButton" type="submit" value="Search"/>
    <br><br>
</form>
<form action="" method="GET">
    <label for="trending">Out of ideas? Get some here!</label>
    <input type="hidden" name="trending_submitted" value="1"/>
    <input class="trendingButton" id="trending" type="submit" value="Show trending"/>
    <br><br>
</form>
<?php require_once 'app\Views\giphys.php'; ?>
</body>
</html>