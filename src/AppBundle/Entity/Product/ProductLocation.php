<?php

namespace AppBundle\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ProductLocation
 *
 * @ORM\Table(name="product_location")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Product\ProductLocationRepository")
 */
class ProductLocation
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
     * @ORM\OneToMany(targetEntity="Product", mappedBy="productLocation")
     */
    private $products;
    
        /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Location\Country", inversedBy="productLocations")
     * @ORM\JoinColumn(name="country_id", nullable=false, referencedColumnName="id")
     */
    private $country;
        
     /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Location\State", inversedBy="productLocations")
     * @ORM\JoinColumn(name="state_id", nullable=false, referencedColumnName="id")
     */
    private $state;
    
     /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Location\City", inversedBy="productLocations")
     * @ORM\JoinColumn(name="city_id", nullable=true, referencedColumnName="id")
     */
    private $city;
    
    
    public function __construct()
    {
        $this->products = new ArrayCollection();
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
     * Add product
     *
     * @param \AppBundle\Entity\Product\Product $product
     *
     * @return ProductLocation
     */
    public function addProduct(\AppBundle\Entity\Product\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \AppBundle\Entity\Product\Product $product
     */
    public function removeProduct(\AppBundle\Entity\Product\Product $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set country
     *
     * @param \AppBundle\Entity\Location\Country $country
     *
     * @return ProductLocation
     */
    public function setCountry(\AppBundle\Entity\Location\Country $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Location\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set state
     *
     * @param \AppBundle\Entity\Location\State $state
     *
     * @return ProductLocation
     */
    public function setState(\AppBundle\Entity\Location\State $state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \AppBundle\Entity\Location\State
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set city
     *
     * @param \AppBundle\Entity\Location\City $city
     *
     * @return ProductLocation
     */
    public function setCity(\AppBundle\Entity\Location\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \AppBundle\Entity\Location\City
     */
    public function getCity()
    {
        return $this->city;
    }
}
