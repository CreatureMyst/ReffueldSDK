<?php

namespace CreatureMyst\ReffueldSDK\Model;

/**
 * Class EventLog
 *
 * @package CreatureMyst\ReffueldSDK\Model
 * @see https://www.reffueld.com/apidocs/#events-and-logs
 */
class EventLog
{
    /** @var \DateTime */
    protected $created;

    /** @var string */
    protected $event;

    /** @var string */
    protected $entityType;

    /** @var string */
    protected $entityId;

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     * @return EventLog
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param string $event
     * @return EventLog
     */
    public function setEvent($event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntityType()
    {
        return $this->entityType;
    }

    /**
     * @param string $entityType
     * @return EventLog
     */
    public function setEntityType($entityType)
    {
        $this->entityType = $entityType;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * @param string $entityId
     * @return EventLog
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;
        return $this;
    }
}
