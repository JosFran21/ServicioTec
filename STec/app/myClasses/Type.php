<?php
    namespace App\myClasses;
    /**
     * Undocumented class
     */
    class Type
    {
        private function __construct(){}

        public static function isUser()
        {
            return logData::getType() == "User" ? true : false;
        }
        public static function isSUser()
        {
            return logData::getType() == "SUser" ? true : false;
        }


    }
?>