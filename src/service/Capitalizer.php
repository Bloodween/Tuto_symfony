<?php


namespace App\service;


class Capitalizer
{
    public  function firstUpper($string){
        return ucfirst(mb_strtolower($string));
    }
}