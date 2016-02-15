<?php

namespace AppBundle\Entity\Taxonomy;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Subsubsubcategory
 *
 * @ORM\Table(name="subsubsubcategory")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Taxonomy\SubsubsubcategoryRepository")
 */
class Subsubsubcategory
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
     * @ORM\ManyToOne(targetEntity="Subsubcategory", inversedBy="subSubSubCategories")
     * @ORM\JoinColumn(name="parent_subsubcategory_id", nullable=false, referencedColumnName="id")
     */
    private $parentSubSubcategory;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=63, unique=true)
     */
    private $name;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;
    
    /**
     * @ORM\Column(name="swap_preference", nullable=true, options={"default":null})
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Product\SwapPreference", mappedBy="subSubSubCategoryPreference")
     */
    private $swapPreference;
    
    /**
     * @ORM\OneToMany(targetEntity="Furthersubcategory", mappedBy="parentSubSubSubcategory")
     */
    private $furtherSubCategories;
    
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Product\Product", mappedBy="subSubSubCategory")
     */
    private $products;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", options={"default":1})
     */
    private $isActive;
    
     public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->swapPreference = new ArrayCollection(); 
        $this->furtherSubCategories = new ArrayCollection();
        
    }


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
     * @return Subsubsubcategory
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
     * @return Subsubsubcategory
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
     * Set swapPreference
     *
     * @param string $swapPreference
     *
     * @return Subsubsubcategory
     */
    public function setSwapPreference($swapPreference)
    {
        $this->swapPreference = $swapPreference;

        return $this;
    }

    /**
     * Get swapPreference
     *
     * @return string
     */
    public function getSwapPreference()
    {
        return $this->swapPreference;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Subsubsubcategory
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
     * Set parentSubSubcategory
     *
     * @param \AppBundle\Entity\Subsubcategory $parentSubSubcategory
     *
     * @return Subsubsubcategory
     */
    public function setParentSubSubcategory(\AppBundle\Entity\Subsubcategory $parentSubSubcategory)
    {
        $this->parentSubSubcategory = $parentSubSubcategory;

        return $this;
    }

    /**
     * Get parentSubSubcategory
     *
     * @return \AppBundle\Entity\Subsubcategory
     */
    public function getParentSubSubcategory()
    {
        return $this->parentSubSubcategory;
    }

    /**
     * Add furtherSubCategory
     *
     * @param \AppBundle\Entity\Furthersubcategory $furtherSubCategory
     *
     * @return Subsubsubcategory
     */
    public function addFurtherSubCategory(\AppBundle\Entity\Furthersubcategory $furtherSubCategory)
    {
        $this->furtherSubCategories[] = $furtherSubCategory;

        return $this;
    }

    /**
     * Remove furtherSubCategory
     *
     * @param \AppBundle\Entity\Furthersubcategory $furtherSubCategory
     */
    public function removeFurtherSubCategory(\AppBundle\Entity\Furthersubcategory $furtherSubCategory)
    {
        $this->furtherSubCategories->removeElement($furtherSubCategory);
    }

    /**
     * Get furtherSubCategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFurtherSubCategories()
    {
        return $this->furtherSubCategories;
    }

    /**
     * Add product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return Subsubsubcategory
     */
    public function addProduct(\AppBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \AppBundle\Entity\Product $product
     */
    public function removeProduct(\AppBundle\Entity\Product $product)
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
}
