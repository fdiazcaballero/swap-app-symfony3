<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CountryRepository")
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
     * @var string
     *
     * @ORM\Column(name="country_code_alpha3", type="string", length=3)
     */
    private $country_code_alpha3;
    
     /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;


    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;
    
    /**
     * @var smallint
     *
     * @ORM\Column(name="phone_prefix", type="smallint")
     */
    private $phone_prefix;
    
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
     * Set countryCodeAlpha3
     *
     * @param string $countryCodeAlpha3
     *
     * @return Country
     */
    public function setCountryCodeAlpha3($countryCodeAlpha3)
    {
        $this->country_code_alpha3 = $countryCodeAlpha3;

        return $this;
    }

    /**
     * Get countryCodeAlpha3
     *
     * @return string
     */
    public function getCountryCodeAlpha3()
    {
        return $this->country_code_alpha3;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Country
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Country
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set phonePrefix
     *
     * @param integer $phonePrefix
     *
     * @return Country
     */
    public function setPhonePrefix($phonePrefix)
    {
        $this->phone_prefix = $phonePrefix;

        return $this;
    }

    /**
     * Get phonePrefix
     *
     * @return integer
     */
    public function getPhonePrefix()
    {
        return $this->phone_prefix;
    }
}
