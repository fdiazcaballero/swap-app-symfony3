<?php

namespace AppBundle\Entity\Location;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Location\CountryRepository")
 */
class Country
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
     * @var string
     *
     * @ORM\Column(name="country_code", type="string", length=3)
     */
    private $country_code;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", options={"default":0})
     */
    private $isActive;
    
    /**
     * @ORM\OneToMany(targetEntity="State", mappedBy="country")
     */
    private $states;
    
    /**
     * @ORM\OneToMany(targetEntity="City", mappedBy="country")
     */
    private $cities;
    
     public function __construct()
    {
        $this->states = new ArrayCollection();
        $this->cities = new ArrayCollection();
    }  

    /**
     * Get id
     *
     * @return integer
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
     * @return Country
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
     * Set countryCode
     *
     * @param string $countryCode
     *
     * @return Country
     */
    public function setCountryCode($countryCode)
    {
        $this->country_code = $countryCode;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Country
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
     * Add state
     *
     * @param \AppBundle\Entity\State $state
     *
     * @return Country
     */
    public function addState(\AppBundle\Entity\State $state)
    {
        $this->states[] = $state;

        return $this;
    }

    /**
     * Remove state
     *
     * @param \AppBundle\Entity\State $state
     */
    public function removeState(\AppBundle\Entity\State $state)
    {
        $this->states->removeElement($state);
    }

    /**
     * Get states
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * Add city
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return Country
     */
    public function addCity(\AppBundle\Entity\City $city)
    {
        $this->cities[] = $city;

        return $this;
    }

    /**
     * Remove city
     *
     * @param \AppBundle\Entity\City $city
     */
    public function removeCity(\AppBundle\Entity\City $city)
    {
        $this->cities->removeElement($city);
    }

    /**
     * Get cities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCities()
    {
        return $this->cities;
    }
}
