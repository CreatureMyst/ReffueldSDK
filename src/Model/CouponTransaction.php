<?php

namespace CreatureMyst\ReffueldSDK\Model;

use CreatureMyst\ReffueldSDK\Utils\ApiModel;

/**
 * Class Transaction
 *
 * @package Model
 * @see https://www.reffueld.com/apidocs/#coupontransaction-model
 */
class CouponTransaction extends ApiModel
{
    const
        TYPE_CHARGE = 'CHARGE',
        TYPE_REFUND = 'REFUND',
        TYPE_INCREASE_BALANCE = 'INCREASE_BALANCE',
        TYPE_DECREASE_BALANCE = 'DECREASE_BALANCE',
        TYPE_EXPIRE_BALANCE = 'EXPIRE_BALANCE',
        TYPE_RECIPROCITY = 'RECIPROCITY',
        TYPE_CLAIM = 'CLAIM';

    /** @var string */
    public $id;
    /** @var \DateTime */
    public $created;
    /** @var float */
    public $amount;
    /** @var string */
    public $type;
    /** @var string */
    public $description;
    /** @var CouponUser */
    public $user;
    /** @var Coupon */
    public $coupon;

    public static function sectionName()
    {
        return 'transaction';
    }

    public function persistBundle()
    {
        return [];
    }
}
