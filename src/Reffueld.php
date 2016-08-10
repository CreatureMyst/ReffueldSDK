<?php

namespace CreatureMyst\ReffueldSDK;

class Reffueld
{
    protected $endPoint = 'https://www.reffueld.com/api/v1/';

    public static function createInstance()
    {
        return new static();
    }

    public function __construct()
    {
    }
}
