<?php declare(strict_types=1);

namespace GiphyPage\Views;

use GiphyPage\GiphyClient;
use GiphyPage\Models\Giphy;

$client = new GiphyClient();

$count = 0;
foreach ($client->getCollection($client->fetch($_GET['keyWord'], (int)$_GET['amount'])) as $giphy) {
    /** @var Giphy $giphy */
    if ($count % 4 === 0) {
        echo "<br>";
    }
    echo "<img class=\"gif\" src=\"{$giphy->getUrl()}\" alt=\"{$giphy->getTitle()}\" />";
    $count += 1;
}