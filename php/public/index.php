<?php
# composer require guzzlehttp/guzzle
# composer require symfony/dom-crawler
# composer require symfony/css-selector

require_once(__DIR__ . '/../vendor/autoload.php');

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @param string $url
 * @param string $selector
 * @return array
 */
function scrapWebpage(string $url, string $selector): array
{
    $res = [];

    try {
        $client = new GuzzleClient();
        $response = $client->request('GET', $url);
    } catch (GuzzleException $e) {
        die('Exception');
    }

    if ($response->getStatusCode() == 200) {
        $html = strval($response->getBody());

        $crawler = new Crawler($html);
        $crawler = $crawler->filter($selector);

        foreach ($crawler as $domElement) {
            $res[] = $domElement->nodeValue;
        }
    }

    return $res;
}

$res = scrapWebpage('http://dev.epiloum.net/', 'h1.entry-title a');
var_dump($res);
