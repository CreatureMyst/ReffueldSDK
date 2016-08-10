#!/bin/php
<?php

require_once __DIR__ . '/vendor/autoload.php';

function writeLn($line)
{
    echo $line . "\r\n";
}

$reffueld = new \CreatureMyst\ReffueldSDK\Reffueld();

writeLn($reffueld->test());