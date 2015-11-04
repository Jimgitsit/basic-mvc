<?php

namespace MongoDocs;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ODM\Document(collection="sample_col")
 */
class SampleDocument extends BaseDocument
{
	/** @ODM\Id */
	private $id;

	/** @ODM\String */
	private $name;

	/** @ODM\String */
	private $machineName;

	/** @ODM\ReferenceOne(targetDocument="Group", simple=true) */
	private $group;

	/** @ODM\String */
	private $type;

	/** @var  @ODM\Hash */
	private $options;

	public function __construct() {
		$this->options = new ArrayCollection();
	}

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set machineName
     *
     * @param string $machineName
     * @return self
     */
    public function setMachineName($machineName)
    {
        $this->machineName = $machineName;
        return $this;
    }

    /**
     * Get machineName
     *
     * @return string $machineName
     */
    public function getMachineName()
    {
        return $this->machineName;
    }

    /**
     * Set group
     *
     * @param MongoDocs\Group $group
     * @return self
     */
    public function setGroup(\MongoDocs\Group $group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * Get group
     *
     * @return MongoDocs\Group $group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set options
     *
     * @param hash $options
     * @return self
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Get options
     *
     * @return hash $options
     */
    public function getOptions()
    {
        return $this->options;
    }
}
