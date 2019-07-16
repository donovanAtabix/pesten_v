<?php

//dit is een test 

function dd($var)
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    //exit;
}

function output($message, $format = 'browser')
{
    echo $message . $format == 'browser' ? "<br>" : PHP_EOL;
}

