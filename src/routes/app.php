<?php
use App\Controller\MonController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/', function (Request $request, Response $response) {
    $page = new MonController("index", $request, $response);
    return $page->response;
});