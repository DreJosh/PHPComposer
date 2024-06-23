<?php

require "vendor/autoload.php";

use Belmo\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_url' => 'https://cursos.alura.com.br/']);
$crawler = new Crawler();

$buscardor = new Buscador($client, $crawler);
$cursos = $buscardor->buscar(url: 'category/programacao');

foreach ($cursos as $linha) {
    echo $linha . PHP_EOL;
}
