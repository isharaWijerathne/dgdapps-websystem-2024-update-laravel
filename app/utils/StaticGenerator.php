<?php 
namespace App\utils;
      class StaticGenerator {

        //private ctor
        private function __construct() {
        }

        //Id Generator -> CAR-0000
        public static function getNextId($lastUsedId){
            
            //get key code
            $keyCode = substr($lastUsedId,0,3);

            //get key value
            $keyValue = substr($lastUsedId,4,4);

            //genarate next number
            $next_number = intval($keyValue) + 1;

            //next availabe id
            $next_availabe_number = $keyCode ."-". str_pad($next_number,4,"0",STR_PAD_LEFT);

            return $next_availabe_number ;
        }
     }
