<?php
/**
 * Created by PhpStorm.
 * User: BOX
 * Date: 11/8/2016
 * Time: 8:56 PM
 */
class session{
    public static function s_start(){
        session_start();
    }

    /**
     * @param $key
     * @param $val
     */
    public static function setvaleu($key, $val){
      $_SESSION['$key']=$val;
    }
    public static function getvaleu($key){
      if(isset($_SESSION['$key'])){
          return $_SESSION['$key'];
      }else{
          return false;
      }
    }

    public static function checksession(){
        self::s_start();
        if(self::getvaleu("login")== false){
            self::destroy();
            header("Location:login.php");
        }

    }
    public static function destroy(){
        session_destroy();
        header("Location:login.php");
    }


}