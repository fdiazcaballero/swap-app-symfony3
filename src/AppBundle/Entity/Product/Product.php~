<?php
// src/AppBundle/Entity/Product/Product.php
namespace AppBundle\Entity\Product;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\JoinColumn(name="user_id", nullable=false, referencedColumnName="id")
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
     * @ORM\Column(type="string", length=63)
     */
    private $condition;
    
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
     * @ORM\Column(type="boolean", options={"default":0})
     */
    private $hasPhoto;
    
    /**
     * @ORM\OneToOne(targetEntity="SwapPreference")
     * @ORM\JoinColumn(name="swap_preference_id", nullable=true, referencedColumnName="id")
     */
    private $swapPreference;
    
     /**
     * @ORM\ManyToOne(targetEntity="ProductTaxonomy", inversedBy="products")
     * @ORM\JoinColumn(name="product_taxonomy_id", nullable=false, referencedColumnName="id")
     */
    private $productTaxonomy;
    
    

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
    * @ORM\PrePersist
    */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
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
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set isFree
     *
     * @param boolean $isFree
     *
     * @return Product
     */
    public function setIsFree($isFree)
    {
        $this->isFree = $isFree;

        return $this;
    }

    /**
     * Get isFree
     *
     * @return boolean
     */
    public function getIsFree()
    {
        return $this->isFree;
    }

    /**
     * Set swapPreference
     *
     * @param \AppBundle\Entity\SwapPreference $swapPreference
     *
     * @return Product
     */
    public function setSwapPreference(\AppBundle\Entity\SwapPreference $swapPreference = null)
    {
        $this->swapPreference = $swapPreference;

        return $this;
    }

    /**
     * Get swapPreference
     *
     * @return \AppBundle\Entity\SwapPreference
     */
    public function getSwapPreference()
    {
        return $this->swapPreference;
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
     * Set condition
     *
     * @param string $condition
     *
     * @return Product
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * Get condition
     *
     * @return string
     */
    public function getCondition()
    {
        return $this->condition;
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
}
