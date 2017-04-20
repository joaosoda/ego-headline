<?php
function func_explode($needle)
{
    return function ($string) use ($needle)
    {
        return explode($needle, $string);
    };
}

function head($array)
{
    return (is_array($array) AND isset($array[0])) ? $array[0] : null;
}

function tail($array)
{
    if(!is_array($array)) return null;

    $tmp = $array;
    array_shift($tmp);

    return (count($tmp) > 0) ? $tmp : null;
}

function orderer($array) // TODO: Tornar mais puro
{
    $return = array();
    $tmp = $array;
    foreach ($tmp as $key) {
        $return[$key] = head(tail($tmp));
        $tmp = tail($tmp);
    }
    return $return;
}

function flatter($array) // TODO: Tornar mais puro
{
    $return = array();
    foreach ($array as $value) {
        foreach($value as $k => $v) {
            $return[$k][] = "$v";
        }
    }
    return $return;
}

function percent($array) // TODO: Tornar mais puro
{
    $return = array();
    foreach($array as $k => $v) {
        $per =  $v / array_sum($array);
        $return[$k] = $per;
    }
    return $return;
}

function get_chance($array) // TODO: Tornar mais puro
{
    $return = array();
    $last = 0;
    foreach($array as $k => $v) {
        $return[$k] = $v + $last;
        $last = $return[$k];
    }
    return $return;
}

function get_by_percent($array, $per)
{
    return array_filter($array, function($value) use ($per) {
        return  $per < $value;
    });
}

function build($letter, $array)
{
    if($letter == "") return $letter;

    $next = head_key(get_by_percent($array[$letter], rand(1, 1000) / 1000));
    return $letter . " " . build($next, $array);
}

function head_key($array)
{
    if(!is_array($array)) return null;

    $tmp = $array;
    reset($tmp);
    return key($tmp);
}

function func_str_replace($search, $replace)
{
    return function ($string) use ($search, $replace)
    {
        return str_replace($search, $replace, $string);
    };
}