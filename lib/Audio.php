<?php

class Audio{
    private $source;

    public function __construct($source){
        $this->source = $source;
    }

    private function getSource(){
        return $this->source;
    }   

    public function getHTML(){
        $resultado = '<audio width="33%" controls>';
        $resultado .= '<source src="'. $this->getSource(). '" type="audio/mpeg">';
        $resultado .= '</audio>';

        return $resultado;
    }
}