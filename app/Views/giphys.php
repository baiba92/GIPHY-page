<?php declare(strict_types=1);

$client = new GiphyPage\GiphyClient();

$count = 0;
foreach ($client->getCollection($client->fetch($_GET['keyWord'], (int)$_GET['amount'])) as $giphy) {
    /** @var GiphyPage\Models\Giphy $giphy */
    if ($count % 4 === 0) {
        echo "<br>";
    }
    echo "<img class=\"gif\" src=\"{$giphy->getUrl()}\" alt=\"{$giphy->getTitle()}\" />";
    $count += 1;
}