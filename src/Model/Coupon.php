<?php

namespace CreatureMyst\ReffueldSDK\Model;

/**
 * Class Coupon
 *
 * @package CreatureMyst\ReffueldSDK\Model
 * @see https://www.reffueld.com/apidocs/#coupon-model-2
 */
class Coupon
{
    /** @var string */
    protected $id;

    /** @var \DateTime */
    protected $created;

    /** @var \DateTime */
    protected $cancelled;

    /** @var string */
    protected $code;

    /** @var integer */
    protected $value;

    /** @var string */
    protected $description;

    /** @var CouponType */
    protected $type;

    /** @var User */
    protected $fromUser;

    /** @var User */
    protected $toUser;

    /** @var integer */
    protected $claimedCount;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Coupon
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
     * @return Coupon
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCancelled()
    {
        return $this->cancelled;
    }

    /**
     * @param \DateTime $cancelled
     * @return Coupon
     */
    public function setCancelled($cancelled)
    {
        $this->cancelled = $cancelled;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Coupon
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return Coupon
     */
    public function setValue($value)
    {
        $this->value = $value;
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
     * @return Coupon
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return CouponType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param CouponType $type
     * @return Coupon
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return User
     */
    public function getFromUser()
    {
        return $this->fromUser;
    }

    /**
     * @param User $fromUser
     * @return Coupon
     */
    public function setFromUser($fromUser)
    {
        $this->fromUser = $fromUser;
        return $this;
    }

    /**
     * @return User
     */
    public function getToUser()
    {
        return $this->toUser;
    }

    /**
     * @param User $toUser
     * @return Coupon
     */
    public function setToUser($toUser)
    {
        $this->toUser = $toUser;
        return $this;
    }

    /**
     * @return int
     */
    public function getClaimedCount()
    {
        return $this->claimedCount;
    }

    /**
     * @param int $claimedCount
     * @return Coupon
     */
    public function setClaimedCount($claimedCount)
    {
        $this->claimedCount = $claimedCount;
        return $this;
    }
}
