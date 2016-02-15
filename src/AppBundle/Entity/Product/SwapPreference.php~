<?php

namespace AppBundle\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;
use AppBundle\DBAL\Types\GeographicSwapPreferenceType;

/**
 * SwapPreference
 *
 * @ORM\Table(name="swap_preference")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Product\SwapPreferenceRepository")
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
     * @ORM\Column(type="boolean", options={"default":0})
     */
    private $isFree;
    
    /**
     * @ORM\Column(type="boolean", options={"default":0})
     */
    private $isWillingToDeliver;
    
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Taxonomy\Category", inversedBy="swapPreference")
     * @ORM\JoinColumn(name="category_preference", nullable=true, referencedColumnName="id")
     */
    private $categoryPreference;
        
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Taxonomy\Subcategory", inversedBy="swapPreference")
     * @ORM\JoinColumn(name="subcategory_preference", nullable=true, referencedColumnName="id")
     */
    private $subCategoryPreference;
    
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Taxonomy\Subsubcategory", inversedBy="swapPreference")
     * @ORM\JoinColumn(name="subsubcategory_preference", nullable=true, referencedColumnName="id")
     */
    private $subSubCategoryPreference;
    
     /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Taxonomy\Subsubsubcategory", inversedBy="swapPreference")
     * @ORM\JoinColumn(name="subsubsubcategory_preference", nullable=true, referencedColumnName="id")
     */
    private $subSubSubCategoryPreference;
    
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Taxonomy\Furthersubcategory", inversedBy="swapPreference")
     * @ORM\JoinColumn(name="furthersubcategory_preference", nullable=true, referencedColumnName="id")
     */
    private $furtherSubCategoryPreference;
    
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
     * Set categoryPreference
     *
     * @param \AppBundle\Entity\Category $categoryPreference
     *
     * @return SwapPreference
     */
    public function setCategoryPreference(\AppBundle\Entity\Category $categoryPreference = null)
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
     * Set subCategoryPreference
     *
     * @param \AppBundle\Entity\Subcategory $subCategoryPreference
     *
     * @return SwapPreference
     */
    public function setSubCategoryPreference(\AppBundle\Entity\Subcategory $subCategoryPreference = null)
    {
        $this->subCategoryPreference = $subCategoryPreference;

        return $this;
    }

    /**
     * Get subCategoryPreference
     *
     * @return \AppBundle\Entity\Subcategory
     */
    public function getSubCategoryPreference()
    {
        return $this->subCategoryPreference;
    }

    /**
     * Set subSubCategoryPreference
     *
     * @param \AppBundle\Entity\Subsubcategory $subSubCategoryPreference
     *
     * @return SwapPreference
     */
    public function setSubSubCategoryPreference(\AppBundle\Entity\Subsubcategory $subSubCategoryPreference = null)
    {
        $this->subSubCategoryPreference = $subSubCategoryPreference;

        return $this;
    }

    /**
     * Get subSubCategoryPreference
     *
     * @return \AppBundle\Entity\Subsubcategory
     */
    public function getSubSubCategoryPreference()
    {
        return $this->subSubCategoryPreference;
    }

    /**
     * Set subSubSubCategoryPreference
     *
     * @param \AppBundle\Entity\Subsubsubcategory $subSubSubCategoryPreference
     *
     * @return SwapPreference
     */
    public function setSubSubSubCategoryPreference(\AppBundle\Entity\Subsubsubcategory $subSubSubCategoryPreference = null)
    {
        $this->subSubSubCategoryPreference = $subSubSubCategoryPreference;

        return $this;
    }

    /**
     * Get subSubSubCategoryPreference
     *
     * @return \AppBundle\Entity\Subsubsubcategory
     */
    public function getSubSubSubCategoryPreference()
    {
        return $this->subSubSubCategoryPreference;
    }

    /**
     * Set furtherSubCategoryPreference
     *
     * @param \AppBundle\Entity\Furthersubcategory $furtherSubCategoryPreference
     *
     * @return SwapPreference
     */
    public function setFurtherSubCategoryPreference(\AppBundle\Entity\Furthersubcategory $furtherSubCategoryPreference = null)
    {
        $this->furtherSubCategoryPreference = $furtherSubCategoryPreference;

        return $this;
    }

    /**
     * Get furtherSubCategoryPreference
     *
     * @return \AppBundle\Entity\Furthersubcategory
     */
    public function getFurtherSubCategoryPreference()
    {
        return $this->furtherSubCategoryPreference;
    }

    /**
     * Set isFree
     *
     * @param boolean $isFree
     *
     * @return SwapPreference
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
     * Set isWillingToDeliver
     *
     * @param boolean $isWillingToDeliver
     *
     * @return SwapPreference
     */
    public function setIsWillingToDeliver($isWillingToDeliver)
    {
        $this->isWillingToDeliver = $isWillingToDeliver;

        return $this;
    }

    /**
     * Get isWillingToDeliver
     *
     * @return boolean
     */
    public function getIsWillingToDeliver()
    {
        return $this->isWillingToDeliver;
    }
}
