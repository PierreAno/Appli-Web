<?php

  class Form {

    private $data;
    public $surround = 'p';

    public function __construct($data = array()){
      $this->data = $data;
    }

    private function surround($html){
      return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    private function getValue($index){
      return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    public function input($text, $name){
      return $this->surround('<input type="text" name="'. $text .'" placeholder="'. $name .'" value="'.$this->getValue($text).'">');
    }

    public function pass($pwd){
      return $this->surround('<input type="password" name="'. $pwd .'" placeholder="Mot de passe" value="'.$this->getValue($pwd).'">');
    }

    public function img($id, $img, $alt){
      return $this->surround('<input type="image" name="'. $id .'" src="./medias/'. $img .'" value="'.$this->getValue($id).'">');
    }

    public function img1($name, $id, $img, $alt){
      return $this->surround('<input class="'.$name.'" type="image" name="'.$name.'" src="./medias/'. $img .'" alt="'.$alt.'" value="'.$id.'">');
    }

    public function submit($name){
      return $this->surround('<button type="submit">'.$name.'</button>');
    }

  }
?>
