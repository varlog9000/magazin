<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 22.04.2019
 * Time: 23:55
 */
function debug($arr, $name = null)
{
    $htmlName = '';
    if ($name) {
        $htmlName = "$name: ";
    }
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}