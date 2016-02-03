<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * State
 *
 * @ORM\Table(name="state")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StateRepository")
 */
class State
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=63)
     */
    private $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="states")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;
    
    /**
     * @var string
     *
     * @ORM\Column(name="state_code", nullable=true, type="string", length=3)
     */
    private $state_code;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", options={"default":0})
     */
    private $isActive;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return State
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set stateCode
     *
     * @param string $stateCode
     *
     * @return State
     */
    public function setStateCode($stateCode)
    {
        $this->state_code = $stateCode;

        return $this;
    }

    /**
     * Get stateCode
     *
     * @return string
     */
    public function getStateCode()
    {
        return $this->state_code;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return State
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     *
     * @return State
     */
    public function setCountry(\AppBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }
}
