<?php

class Video{
    private $source;

    public function __construct($source){
        $this->source = $source;
    }

    private function getSource(){
        return $this->source;
    }   

    public function getHTML(){
        $resultado = '<video width="33%" controls>';
        $resultado .= '<source src="'. $this->getSource(). '" type="video/mp4">';
        $resultado .= '</video>';

        return $resultado;
    }
}