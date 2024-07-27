<?php

namespace App\Controller;

use App\Controller\BaseController;

class MonController extends BaseController{
  public function index(){
    $this->template = "index";
  }
}