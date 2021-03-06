<?php

namespace CreatureMyst\ReffueldSDK\Model;

use CreatureMyst\ReffueldSDK\Utils\ApiModel;

/**
 * Class User
 *
 * @package CreatureMyst\ReffueldSDK\Model
 * @see https://www.reffueld.com/apidocs/#couponuser-model
 */
class CouponUser extends ApiModel
{
    const
        ROLE_COMPANY = 'COMPANY',
        ROLE_SUPPLIER = 'SUPPLIER',
        ROLE_CONSUMER = 'CONSUMER';

    /** @var string */
    public $id;
    /** @var  boolean */
    public $enabled;
    /** @var \DateTime */
    public $created;
    /** @var string */
    public $name;
    /** @var string */
    public $email;
    /** @var string */
    public $external_id;
    /** @var string */
    public $role = self::ROLE_CONSUMER;
    /** @var array */
    public $tags;
    /** @var float */
    public $balance = 0;
    /** @var string */
    public $description;
    /** @var integer */
    public $coupon_count;
    /** @var \DateTime */
    public $last_claim;
    /** @var \DateTime */
    public $lastTransaction;

    /**
     * @param string $id
     * @return CouponUser
     */
    public function setId($id)
    {
        $this->id = (string)$id;
        return $this;
    }

    /**
     * @param string $name
     * @return CouponUser
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param $email
     * @return CouponUser
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string $external_id
     * @return CouponUser
     */
    public function setExternalId($external_id)
    {
        $this->external_id = $external_id;
        return $this;
    }

    /**
     * @param string $role
     * @return CouponUser
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @param array $tags
     * @return CouponUser
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @param integer $balance
     * @return CouponUser
     */
    public function setBalance($balance)
    {
        if (is_float($balance)) {
            $balance = $balance * 100;
        }

        $this->balance = $balance;
        return $this;
    }

    /**
     * @param string $description
     * @return CouponUser
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public static function sectionName()
    {
        return 'user';
    }

    public function persistBundle()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'balance' => $this->balance,
            'description' => $this->description,
        ];
    }

    /**
     * Claim coupon by code.
     *
     * @param string $code
     * @return bool
     */
    public function claimCoupon($code)
    {
        $url = static::sectionName() . '/' . $this->id . '/claim/' . $code;
        $response = $this->request($url, parent::METHOD_POST, ['description' => 'Claimed'], false);

        return $response->getStatusCode() == 200;
    }

    /**
     * Charge with auto reward.
     *
     * @param int $amount (float amount * 100)
     * @param null|string $description
     * @return bool
     */
    public function charge($amount, $description = null)
    {
        $url = static::sectionName() . '/' . $this->id . '/charge';
        $response = $this->request($url, parent::METHOD_POST, [
            'amount' => $amount,
            'reciprocate' => true,
            'description' => $description,
        ], false);

        return $response->getStatusCode() == 201;
    }
}
