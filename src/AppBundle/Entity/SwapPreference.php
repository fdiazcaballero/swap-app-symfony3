<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;
use AppBundle\DBAL\Types\GeographicSwapPreferenceType;

/**
 * SwapPreference
 *
 * @ORM\Table(name="swap_preference")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SwapPreferenceRepository")
 */
class SwapPreference
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", nullable=false, referencedColumnName="id")
     */
    private $product;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="swapPreference")
     * @ORM\JoinColumn(name="category_preference", nullable=true, referencedColumnName="id")
     */
    private $categoryPreference;
        
    /**
     * @ORM\ManyToOne(targetEntity="Subcategory", inversedBy="swapPreference")
     * @ORM\JoinColumn(name="subcategory_preference", nullable=true, referencedColumnName="id")
     */
    private $subcategoryPreference;
    
    /**
     * @ORM\ManyToOne(targetEntity="Subsubcategory", inversedBy="swapPreference")
     * @ORM\JoinColumn(name="subsubcategory_preference", nullable=true, referencedColumnName="id")
     */
    private $subsubcategoryPreference;
    
     /**
     * @ORM\ManyToOne(targetEntity="Subsubsubcategory", inversedBy="swapPreference")
     * @ORM\JoinColumn(name="subsubsubcategory_preference", nullable=true, referencedColumnName="id")
     */
    private $subsubsubcategoryPreference;
    
    /**
     * Note, that type of a field should be same as you set in Doctrine config
     * (in this case it is GeographicSwapPreferenceType)
     *
     * @ORM\Column(name="geographic_preference", type="GeographicSwapPreferenceType", nullable=false, options={"default":"ST"})
     * @DoctrineAssert\Enum(entity="AppBundle\DBAL\Types\GeographicSwapPreferenceType")     
     */
    private $geographicPreference;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_email_alert", type="boolean", options={"default":0})
     */
    private $isEmailAlert;


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
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return SwapPreference
     */
    public function setProduct(\AppBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set categoryPreference
     *
     * @param \AppBundle\Entity\Category $categoryPreference
     *
     * @return SwapPreference
     */
    public function setCategoryPreference1(\AppBundle\Entity\Category $categoryPreference = null)
    {
        $this->categoryPreference = $categoryPreference;

        return $this;
    }

    /**
     * Get categoryPreference
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategoryPreference()
    {
        return $this->categoryPreference;
    }

    
    /**
     * Set geographicPreference
     *
     * @param GeographicSwapPreferenceType $geographicPreference
     *
     * @return SwapPreference
     */
    public function setGeographicPreference($geographicPreference)
    {
        $this->geographicPreference = $geographicPreference;

        return $this;
    }

    /**
     * Get geographicPreference
     *
     * @return GeographicSwapPreferenceType
     */
    public function getGeographicPreference()
    {
        return $this->geographicPreference;
    }

    /**
     * Set isEmailAlert
     *
     * @param boolean $isEmailAlert
     *
     * @return SwapPreference
     */
    public function setIsEmailAlert($isEmailAlert)
    {
        $this->isEmailAlert = $isEmailAlert;

        return $this;
    }

    /**
     * Get isEmailAlert
     *
     * @return boolean
     */
    public function getIsEmailAlert()
    {
        return $this->isEmailAlert;
    }

    /**
     * Set subcategoryPreference
     *
     * @param \AppBundle\Entity\Subcategory $subcategoryPreference
     *
     * @return SwapPreference
     */
    public function setSubcategoryPreference(\AppBundle\Entity\Subcategory $subcategoryPreference = null)
    {
        $this->subcategoryPreference = $subcategoryPreference;

        return $this;
    }

    /**
     * Get subcategoryPreference
     *
     * @return \AppBundle\Entity\Subcategory
     */
    public function getSubcategoryPreference()
    {
        return $this->subcategoryPreference;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return SwapPreference
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
     * Set categoryPreference
     *
     * @param \AppBundle\Entity\Category $categoryPreference
     *
     * @return SwapPreference
     */
    public function setCategoryPreference(\AppBundle\Entity\Category $categoryPreference)
    {
        $this->categoryPreference = $categoryPreference;

        return $this;
    }

    /**
     * Set subsubcategoryPreference
     *
     * @param \AppBundle\Entity\Subsubcategory $subsubcategoryPreference
     *
     * @return SwapPreference
     */
    public function setSubsubcategoryPreference(\AppBundle\Entity\Subsubcategory $subsubcategoryPreference = null)
    {
        $this->subsubcategoryPreference = $subsubcategoryPreference;

        return $this;
    }

    /**
     * Get subsubcategoryPreference
     *
     * @return \AppBundle\Entity\Subsubcategory
     */
    public function getSubsubcategoryPreference()
    {
        return $this->subsubcategoryPreference;
    }

    /**
     * Set subsubsubcategoryPreference
     *
     * @param \AppBundle\Entity\Subsubsubcategory $subsubsubcategoryPreference
     *
     * @return SwapPreference
     */
    public function setSubsubsubcategoryPreference(\AppBundle\Entity\Subsubsubcategory $subsubsubcategoryPreference = null)
    {
        $this->subsubsubcategoryPreference = $subsubsubcategoryPreference;

        return $this;
    }

    /**
     * Get subsubsubcategoryPreference
     *
     * @return \AppBundle\Entity\Subsubsubcategory
     */
    public function getSubsubsubcategoryPreference()
    {
        return $this->subsubsubcategoryPreference;
    }
}
