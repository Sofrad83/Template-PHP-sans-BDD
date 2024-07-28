<?php

namespace App\Controller;

class BaseController{
  public $template;
  public $data = [];
  public $status = 200;
  public $response;

  public $json = false;

  public function __construct($action, $request, $response){
    if (!method_exists($this, $action)){
      $this->template = "page404";
      $this->status = 404;
      return;
    }
    $this->$action($request);
    if($this->json){
      $this->makeJson($response);
    }else{
      $this->makePage($response);
    }
  }

  public function makePage($response){
    global $twig;
    $html = $twig->render($this->template.".twig", $this->data);
    $response->getBody()->write($html);
    $this->response  = $response;
  }

  public function makeJson($response){
    $response->getBody()->write(json_encode($this->data));
    $this->response  = $response->withHeader('Content-Type', 'application/json');
  }
}