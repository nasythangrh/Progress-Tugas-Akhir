<?php
/**
 * Created by PhpStorm.
 * User: WorldSmntr
 * Date: 27/05/2019
 * Time: 14:53
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('nominal')) {
    function nominal($angka){
        $jd = number_format($angka, 0, ',', '.');
        return $jd;
    }
}