<?php

class Image{
    private $source;

    public function __construct($source){
        $this->source = $source;
    }

    private function getSource(){
        return $this->source;
    }   

    public function getHTML(){
        return '<img src="' . $this->getSource(). '" width="33%" class="img-fluid">';
    }
}

?>