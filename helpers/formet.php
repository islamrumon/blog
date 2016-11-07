<?php

/**
 * Created by PhpStorm.
 * User: BOX
 * Date: 11/4/2016
 * Time: 6:50 AM
 */
class formet
{


 public function date($date){
     return date("l jS \f F Y h:i:s A",strtotime($date));
     /*
      * this is for date fomet method*/
 }
    public function author($name){
         return ucfirst($name);
        /*
         * this for author uperletter method*/
    }

    public function short($text, $limit){
        $text=$text." ";
        $text=substr($text,0,$limit);
        $text=substr($text,0,strrpos($text,' '));
        $text=$text.".....";
        return $text;
        /*
         * this is for text formet lemit methode*/

    }

    public function pic($img){
        $img="./admin/uplode/$img";
        return $img;
        /*
         * this is img showin method*/
    }
}