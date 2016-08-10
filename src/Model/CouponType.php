<?php

namespace CreatureMyst\ReffueldSDK\Model;

/**
 * Class CouponType
 *
 * @package CreatureMyst\ReffueldSDK\Model
 * @see https://www.reffueld.com/apidocs/#coupon-type
 */
class CouponType
{
    const
        CODE_TYPE_RANDOM = 'RANDOM',
        CODE_TYPE_SEQUENTIAL = 'SEQUENTIAL',

        APPLICABILITY_ANY = 'ANY',
        APPLICABILITY_NEW_USER_ONLY = 'NEW_USER_ONLY';

    /** @var string */
    protected $id;

    /** @var \DateTime */
    protected $created;

    /** @var \DateTime */
    protected $cancelled;

    /** @var \DateTime */
    protected $expiry;

    /** @var string */
    protected $name;

    /** @var string */
    protected $description;

    /** @var array */
    protected $tags;

    /** @var integer */
    protected $value;

    /** @var integer */
    protected $reciprocalValue;

    /** @var string */
    protected $fromRole;

    /** @var string */
    protected $toRole;

    /** @var string */
    protected $codeType = self::CODE_TYPE_RANDOM;

    /** @var string */
    protected $codePrefix;

    /** @var integer */
    protected $claimLimit;

    /** @var integer */
    protected $issuedCount;

    /** @var string */
    protected $applicability = self::APPLICABILITY_ANY;

    /** @var string TODO: JSON-TO-OBJECT */
    protected $fences;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return CouponType
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
     * @return CouponType
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
     * @return CouponType
     */
    public function setCancelled($cancelled)
    {
        $this->cancelled = $cancelled;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpiry()
    {
        return $this->expiry;
    }

    /**
     * @param \DateTime $expiry
     * @return CouponType
     */
    public function setExpiry($expiry)
    {
        $this->expiry = $expiry;
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
     * @return CouponType
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return CouponType
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return CouponType
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
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
     * @return CouponType
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getReciprocalValue()
    {
        return $this->reciprocalValue;
    }

    /**
     * @param int $reciprocalValue
     * @return CouponType
     */
    public function setReciprocalValue($reciprocalValue)
    {
        $this->reciprocalValue = $reciprocalValue;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromRole()
    {
        return $this->fromRole;
    }

    /**
     * @param string $fromRole
     * @return CouponType
     */
    public function setFromRole($fromRole)
    {
        $this->fromRole = $fromRole;
        return $this;
    }

    /**
     * @return string
     */
    public function getToRole()
    {
        return $this->toRole;
    }

    /**
     * @param string $toRole
     * @return CouponType
     */
    public function setToRole($toRole)
    {
        $this->toRole = $toRole;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodeType()
    {
        return $this->codeType;
    }

    /**
     * @param string $codeType
     * @return CouponType
     */
    public function setCodeType($codeType)
    {
        $this->codeType = $codeType;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodePrefix()
    {
        return $this->codePrefix;
    }

    /**
     * @param string $codePrefix
     * @return CouponType
     */
    public function setCodePrefix($codePrefix)
    {
        $this->codePrefix = $codePrefix;
        return $this;
    }

    /**
     * @return int
     */
    public function getClaimLimit()
    {
        return $this->claimLimit;
    }

    /**
     * @param int $claimLimit
     * @return CouponType
     */
    public function setClaimLimit($claimLimit)
    {
        $this->claimLimit = $claimLimit;
        return $this;
    }

    /**
     * @return int
     */
    public function getIssuedCount()
    {
        return $this->issuedCount;
    }

    /**
     * @param int $issuedCount
     * @return CouponType
     */
    public function setIssuedCount($issuedCount)
    {
        $this->issuedCount = $issuedCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicability()
    {
        return $this->applicability;
    }

    /**
     * @param string $applicability
     * @return CouponType
     */
    public function setApplicability($applicability)
    {
        $this->applicability = $applicability;
        return $this;
    }

    /**
     * @return string
     */
    public function getFences()
    {
        return $this->fences;
    }

    /**
     * @param string $fences
     * @return CouponType
     */
    public function setFences($fences)
    {
        $this->fences = $fences;
        return $this;
    }
}
