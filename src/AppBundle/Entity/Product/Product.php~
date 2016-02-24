<?php
// src/AppBundle/Entity/Product/Product.php
namespace AppBundle\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Product\ProductRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
     /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\User", inversedBy="products")
     * @ORM\JoinColumn(name="user_id", nullable=true, referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=63)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;
    
     /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $years;
    
    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $months;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;   
    
    /**
     * @ORM\Column(type="boolean", options={"default":0}, nullable=true)
     */
    private $hasPhoto;
    
    /**
     * @ORM\OneToOne(targetEntity="SwapPreference")
     * @ORM\JoinColumn(name="swap_preference_id", nullable=true, referencedColumnName="id")
     * @Assert\Type(type="AppBundle\Entity\Product\SwawpPreference")
     * @Assert\Valid()
     */
    private $swapPreference;
    
     /**
     * @ORM\ManyToOne(targetEntity="ProductTaxonomy", inversedBy="products")
     * @ORM\JoinColumn(name="product_taxonomy_id", nullable=true, referencedColumnName="id")
     * @Assert\Type(type="AppBundle\Entity\Product\ProductTaxonomy")
     * @Assert\Valid()
     */
    private $productTaxonomy;
    
    /**
     * @ORM\ManyToOne(targetEntity="ProductLocation", inversedBy="products")
     * @ORM\JoinColumn(name="product_location_id", nullable=false, referencedColumnName="id")
     * @Assert\Type(type="AppBundle\Entity\Product\ProductLocation")
     * @Assert\Valid()
     */
    private $productLocation;
    
    /**
     * @ORM\ManyToOne(targetEntity="ProductCondition", inversedBy="products")
     * @ORM\JoinColumn(name="product_condition_id", nullable=false, referencedColumnName="id")
     * @Assert\Type(type="AppBundle\Entity\Product\ProductCondition")
     * @Assert\Valid()
     */
    private $productCondition;    
   

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
     * @return Product
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
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set years
     *
     * @param integer $years
     *
     * @return Product
     */
    public function setYears($years)
    {
        $this->years = $years;

        return $this;
    }

    /**
     * Get years
     *
     * @return integer
     */
    public function getYears()
    {
        return $this->years;
    }

    /**
     * Set months
     *
     * @param integer $months
     *
     * @return Product
     */
    public function setMonths($months)
    {
        $this->months = $months;

        return $this;
    }

    /**
     * Get months
     *
     * @return integer
     */
    public function getMonths()
    {
        return $this->months;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Product
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
    
    /**
    * @ORM\PrePersist
    */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set hasPhoto
     *
     * @param boolean $hasPhoto
     *
     * @return Product
     */
    public function setHasPhoto($hasPhoto)
    {
        $this->hasPhoto = $hasPhoto;

        return $this;
    }

    /**
     * Get hasPhoto
     *
     * @return boolean
     */
    public function getHasPhoto()
    {
        return $this->hasPhoto;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Product
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set swapPreference
     *
     * @param \AppBundle\Entity\Product\SwapPreference $swapPreference
     *
     * @return Product
     */
    public function setSwapPreference(\AppBundle\Entity\Product\SwapPreference $swapPreference = null)
    {
        $this->swapPreference = $swapPreference;

        return $this;
    }

    /**
     * Get swapPreference
     *
     * @return \AppBundle\Entity\Product\SwapPreference
     */
    public function getSwapPreference()
    {
        return $this->swapPreference;
    }

    /**
     * Set productTaxonomy
     *
     * @param \AppBundle\Entity\Product\ProductTaxonomy $productTaxonomy
     *
     * @return Product
     */
    public function setProductTaxonomy(\AppBundle\Entity\Product\ProductTaxonomy $productTaxonomy)
    {
        $this->productTaxonomy = $productTaxonomy;

        return $this;
    }

    /**
     * Get productTaxonomy
     *
     * @return \AppBundle\Entity\Product\ProductTaxonomy
     */
    public function getProductTaxonomy()
    {
        return $this->productTaxonomy;
    }

    /**
     * Set productLocation
     *
     * @param \AppBundle\Entity\Product\ProductLocation $productLocation
     *
     * @return Product
     */
    public function setProductLocation(\AppBundle\Entity\Product\ProductLocation $productLocation)
    {
        $this->productLocation = $productLocation;

        return $this;
    }

    /**
     * Get productLocation
     *
     * @return \AppBundle\Entity\Product\ProductLocation
     */
    public function getProductLocation()
    {
        return $this->productLocation;
    }

    /**
     * Set productCondition
     *
     * @param \AppBundle\Entity\Product\ProductCondition $productCondition
     *
     * @return Product
     */
    public function setProductCondition(\AppBundle\Entity\Product\ProductCondition $productCondition)
    {
        $this->productCondition = $productCondition;

        return $this;
    }

    /**
     * Get productCondition
     *
     * @return \AppBundle\Entity\Product\ProductCondition
     */
    public function getProductCondition()
    {
        return $this->productCondition;
    }
}
