<?php

namespace CreatureMyst\ReffueldSDK\Interfaces;

interface Reffueldable
{
    /**
     * Reffueld API Section Name.
     *
     * @return string
     */
    public static function sectionName();

    public function save();
    public function delete();

    public static function findOne($id);
    public static function findAll();

    public function persistBundle();
}
