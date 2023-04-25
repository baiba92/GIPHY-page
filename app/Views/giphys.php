<?php declare(strict_types=1);

namespace GiphyPage\Views;

use GiphyPage\GiphyClient;
use GiphyPage\Models\Giphy;

$client = new GiphyClient();

$count = 0;

if (isset($_GET['trending_submitted'])) {
    echo "<p>Trending GIFS</p>";

    foreach ($client->getCollection($client->fetchTrending()) as $giphy) {
        /** @var Giphy $giphy */
        if ($count % 4 === 0) {
            echo "<br>";
        }
        echo "<img class=\"gif\" src=\"{$giphy->getUrl()}\" alt=\"{$giphy->getTitle()}\" />";
        $count += 1;
    }

} elseif (isset($_GET['search_submitted'])) {
    $collection = $client->getCollection($client->fetchSearched($_GET['keyWord'], (int)$_GET['amount']));

    if (!$collection) {
        echo "<p>No GIFS to show, search again</p><br>";
        exit;
    }

    $keyWord = ucfirst($_GET['keyWord']);
    echo "<p>$keyWord GIFS</p>";
    foreach ($collection as $giphy) {
        /** @var Giphy $giphy */
        if ($count % 4 === 0) {
            echo "<br>";
        }
        echo "<img class=\"gif\" src=\"{$giphy->getUrl()}\" alt=\"{$giphy->getTitle()}\" />";
        $count += 1;
    }
}