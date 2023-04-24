<?php declare(strict_types=1);

namespace GiphyPage;

use GuzzleHttp\Client;
use GiphyPage\Models\Giphy;

class GiphyClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetch(string $keyWord, int $amount): array
    {
        $response = $this->client->get('api.giphy.com/v1/gifs/search', [
            'query' => [
                'api_key' => $_ENV['GIPHY_API_KEY'],
                'q' => $keyWord,
                'limit' => $amount,
                'offset' => floor(rand(0, 4999))
            ]
        ]);
        return json_decode($response->getBody()->getContents())->data;
    }

    public function getCollection(array $fetchedRecords): array
    {
        $collection = [];
        foreach ($fetchedRecords as $giphy) {
            $collection[] = new Giphy(
                $giphy->title,
                $giphy->images->fixed_height->url
            );
        }
        return $collection;
    }
}