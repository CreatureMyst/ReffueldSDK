<?php

namespace CreatureMyst\ReffueldSDK\Model;

use CreatureMyst\ReffueldSDK\Utils\ApiModel;

/**
 * Class Coupon
 *
 * @package CreatureMyst\ReffueldSDK\Model
 * @see https://www.reffueld.com/apidocs/#coupon-model-2
 */
class Coupon extends ApiModel
{
    /** @var string */
    public $id;
    /** @var \DateTime */
    public $created;
    /** @var \DateTime */
    public $cancelled;
    /** @var string */
    public $code;
    /** @var integer */
    public $value;
    /** @var string */
    public $description;
    /** @var CouponType */
    public $type;
    /** @var CouponUser */
    public $from_user;
    /** @var CouponUser */
    public $to_user;
    /** @var integer */
    public $claimed_count;

    public static function sectionName()
    {
        return 'coupon';
    }

    public function persistBundle()
    {
        return [];  // TODO: Fix it
    }
}
