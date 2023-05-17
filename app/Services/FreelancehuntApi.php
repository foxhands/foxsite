<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class FreelancehuntApi
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @throws GuzzleException
     */
    public function getProjectsByCategory($category)
    {
        $response = $this->client->request('GET', 'https://api.freelancehunt.com/v2/projects', [
            'query' => [
                'filter[skills]' => $category
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}
