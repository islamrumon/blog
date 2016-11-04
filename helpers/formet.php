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
 }
    public function author($name){
         return ucfirst($name);
    }
}