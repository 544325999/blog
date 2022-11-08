<?php
if (!defined('ZBP_PATH')) {
    exit('Access denied');
}

function getClient()
{
    return new \GuzzleHttp\Client([
        'base_uri' => $_ENV['SERVICE_API'],
        'headers' => [],
        ]);
}

function getData($msg, $offset = 1, $limit = 4)
{
    $client = getClient();
    try {
        $response = $client->get('index/index', [
            'query' => [
                'msg' => $msg,
                'offset' => $offset,
                'limit' => $limit
            ]
        ]);
        $body = (string) $response->getBody();
        return json_decode($body, true);
    } catch (Exception $exception) {
        return $exception->getMessage();
    }

}
