<?php

namespace CreatureMyst\ReffueldSDK\Model;

use CreatureMyst\ReffueldSDK\Utils\ApiModel;

/**
 * Class CouponType
 *
 * @package CreatureMyst\ReffueldSDK\Model
 * @see https://www.reffueld.com/apidocs/#coupon-type
 */
class CouponType extends ApiModel
{
    const
        CODE_TYPE_RANDOM = 'RANDOM',
        CODE_TYPE_SEQUENTIAL = 'SEQUENTIAL',

        APPLICABILITY_ANY = 'ANY',
        APPLICABILITY_NEW_USER_ONLY = 'NEW_USER_ONLY';

    /** @var string */
    public $id;
    /** @var \DateTime */
    public $created;
    /** @var \DateTime */
    public $cancelled;
    /** @var \DateTime */
    public $expiry;
    /** @var string */
    public $name;
    /** @var string */
    public $description;
    /** @var array */
    public $tags;
    /** @var integer */
    public $value;
    /** @var integer */
    public $reciprocal_value;
    /** @var string */
    public $from_role;
    /** @var string */
    public $to_role;
    /** @var string */
    public $code_type = self::CODE_TYPE_RANDOM;
    /** @var string */
    public $code_prefix;
    /** @var integer */
    public $claim_limit;
    /** @var integer */
    public $issued_count;
    /** @var string */
    public $applicability = self::APPLICABILITY_ANY;
    /** @var string TODO: JSON-TO-OBJECT */
    public $fences;

    public static function sectionName()
    {
        return 'coupontype';
    }

    public function persistBundle()
    {
        return [
            'id' => $this->id,
            'created' => $this->created,
            'cancelled' => $this->cancelled,
            'expiry' => $this->expiry,
            'name' => $this->name,
            'description' => $this->description,
            'tags' => $this->tags,
            'value' => $this->value,
            'reciprocal_value' => $this->reciprocal_value,
            'from_role' => $this->from_role,
            'to_role' => $this->to_role,
            'code_type' => $this->code_type,
            'code_prefix' => $this->code_prefix,
            'claim_limit' => $this->claim_limit,
            'issued_count' => $this->issued_count,
            'applicability' => $this->applicability,
            'fences' => $this->fences,
        ];
    }

    /**
     * Issue new coupon from provided user.
     *
     * @param CouponUser $user
     * @param int $quantity
     * @return string
     */
    public function issueCoupon(CouponUser $user, $quantity = 1)
    {
        $url = static::sectionName() . '/' . $this->id . '/issue';
        $response = $this->request($url, parent::METHOD_POST, [
            'from_user_id' => $user->id,
            'quantity' => $quantity
        ], false);

        $data = \GuzzleHttp\json_decode($response->getBody()->getContents());
        $code = $data->data[0];
        return $code;
    }
}
