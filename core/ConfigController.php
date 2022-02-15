<?php

  namespace Core;


  class ConfigController{
    private string $url;
    public function __construct(){
        $this->url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);
        echo "pg interna - " . $this->url;
    }
  }

?>