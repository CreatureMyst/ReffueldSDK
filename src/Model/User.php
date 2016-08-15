<?php

namespace CreatureMyst\ReffueldSDK\Model;

use CreatureMyst\ReffueldSDK\Interfaces\Reffueldable;

/**
 * Class User
 *
 * @package CreatureMyst\ReffueldSDK\Model
 * @see https://www.reffueld.com/apidocs/#couponuser-model
 */
class User implements Reffueldable
{
    const
        ROLE_COMPANY = 'COMPANY',
        ROLE_SUPPLIER = 'SUPPLIER',
        ROLE_CONSUMER = 'CONSUMER';

    /** @var string */
    protected $id;

    /** @var  boolean */
    protected $enabled;

    /** @var \DateTime */
    protected $created;

    /** @var string */
    protected $name;

    /** @var string */
    protected $email;

    /** @var string */
    protected $externalId;

    /** @var string */
    protected $role = self::ROLE_CONSUMER;

    /** @var array */
    protected $tags;

    /** @var float */
    protected $balance;

    /** @var string */
    protected $description;

    /** @var integer */
    protected $couponCount;

    /** @var \DateTime */
    protected $lastClaim;

    /** @var \DateTime */
    protected $lastTransaction;

    public function getSection()
    {
        return 'user';
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param boolean $enabled
     * @return User
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
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
     * @return User
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     * @return User
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return User
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     * @return User
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
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
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getCouponCount()
    {
        return $this->couponCount;
    }

    /**
     * @param int $couponCount
     * @return User
     */
    public function setCouponCount($couponCount)
    {
        $this->couponCount = $couponCount;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastClaim()
    {
        return $this->lastClaim;
    }

    /**
     * @param \DateTime $lastClaim
     * @return User
     */
    public function setLastClaim($lastClaim)
    {
        $this->lastClaim = $lastClaim;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastTransaction()
    {
        return $this->lastTransaction;
    }

    /**
     * @param \DateTime $lastTransaction
     * @return User
     */
    public function setLastTransaction($lastTransaction)
    {
        $this->lastTransaction = $lastTransaction;
        return $this;
    }

    public function toJson()
    {
        return json_encode(get_object_vars($this));
    }
}
