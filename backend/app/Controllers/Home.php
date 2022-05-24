<?php
namespace App\Controllers;
use GuzzleHttp\Client as httpClient;
use Illuminate\Database\Eloquent\Collection;
use Seld\JsonLint\JsonParser;

class Home extends BaseController
{
  public function index() {
    return view('v_landpg');
  }
  public function crypto() {
    echo "Data Crypto<br>";
    $id_coin = ['bitcoin'];
    $parser = $JsonParser();
    $client = new httpClient(['base_uri' => "https://api.coincap.io/v2"]);
    $response = $client->request('GET', 'assets');
    $content = collect(($parser->parse($response->getBody()->getContents())->data ?? []));
    $coin = $content->whereIn('id', $id_coin)->all();
    dd($coin);
    return $coin;
  }
  public function stocks() {
    echo "Data Stocks<br>";
    $urlstk = file_get_contents("https://financialmodelingprep.com/api/v3/financial-statement-symbol-lists?apikey=b202b16899d34e9a39be88a25067a031");

    $result = json_decode($urlstk, true);
    echo "<pre>";
    print_r($result);
    echo "</pre>";

  }
  public function forex() {
    echo "Data Forex";
  }
}