<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giphy page</title>
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arvo:wght@400;700&display=swap">
</head>
<body>
<h1>GIFS FOR FUN!</h1>
<form action="" method="GET">
    <label for="keyWord">Enter keyword to search GIFS:</label>
    <input class="input" id="keyWord" type="text" name="keyWord" required maxlength="50"/><br>
    <label for="amount">How many GIFS to display? (up to 25)</label>
    <input class="input" id="amount" type="number" name="amount" required max="25" min="1"/><br>
    <button class="button" type="submit" name="submit" value="search">Search</button>
    <br><br>
</form>
<?php require_once 'app\Views\giphys.php'; ?>
</body>
</html>