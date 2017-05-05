<?php

namespace Bavix\Demo;

include_once dirname(__DIR__) . '/vendor/autoload.php';

$iterator = new \Bavix\Iterator\Iterator();

foreach (range(1, 10) as $item)
{
    $iterator[] = $item;
}

var_dump(iterator_to_array($iterator));
