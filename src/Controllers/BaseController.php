<?php

namespace App\Controller;

class BaseController{
  public $template;
  public $data = [];
  public $status = 200;
  public $response;

  public function __construct($action, $request, $response){
    if (!method_exists($this, $action)){
      $this->template = "page404";
      $this->status = 404;
      return;
    }
    $this->$action($request);
    $this->makePage($response);
  }

  public function makePage($response){
    global $twig;
    $html = $twig->render($this->template.".twig", $this->data);
    $response->getBody()->write($html);
    $this->response  = $response;
  }
}