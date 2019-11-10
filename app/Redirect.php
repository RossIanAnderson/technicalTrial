<?php

class Redirect
{
    public static function to($path){
        return header('Location: ' . $path);
    }
}