<?php

namespace CreatureMyst\ReffueldSDK\Model;

/**
 * Class Transaction
 *
 * @package Model
 * @see https://www.reffueld.com/apidocs/#coupontransaction-model
 */
class Transaction
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
    protected $id;

    /** @var \DateTime */
    protected $created;

    /** @var float */
    protected $amount;

    /** @var string */
    protected $type;

    /** @var string */
    protected $description;

    /** @var User */
    protected $user;

    /** @var Coupon */
    protected $coupon;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Transaction
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     * @return Transaction
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return Transaction
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Transaction
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Transaction
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Transaction
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return Coupon
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * @param Coupon $coupon
     * @return Transaction
     */
    public function setCoupon($coupon)
    {
        $this->coupon = $coupon;
        return $this;
    }
}
