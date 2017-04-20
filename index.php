<?php
require('src/tools.php');
$headlines = require('data.php');

$rand = rand(1, 1000) / 1000;

$starters = array_map(func_explode(' '), $headlines);
$starters = array_map('head', $starters);
$starters = array_count_values($starters);
$starters = percent($starters);
$starters = get_chance($starters);
$starters = get_by_percent($starters, $rand);

$start    = head_key($starters);

$headlines = array_map(func_explode(' '), $headlines);
$headlines = array_map('orderer', $headlines);
$headlines = flatter($headlines);
$headlines = array_map('array_count_values', $headlines);
$headlines = array_map('percent', $headlines);
$headlines = array_map('get_chance', $headlines);

echo "<pre>";
echo str_replace("'", "", build($start, $headlines));