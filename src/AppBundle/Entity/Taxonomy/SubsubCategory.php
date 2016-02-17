<?php

namespace AppBundle\Entity\Taxonomy;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SubsubCategory
 *
 * @ORM\Table(name="subsub_category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Taxonomy\SubsubCategoryRepository")
 */
class SubsubCategory
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
     * @ORM\ManyToOne(targetEntity="SubCategory", inversedBy="subSubCategories")
     * @ORM\JoinColumn(name="parent_sub_category_id", nullable=false, referencedColumnName="id")
     */
    private $parentSubCategory;

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
     * @ORM\OneToMany(targetEntity="SubsubsubCategory", mappedBy="parentSubSubCategory")
     */
    private $subSubSubCategories;
    
    /**
     * @ORM\Column(name="swap_preference", nullable=true, options={"default":null})
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Product\SwapPreference", mappedBy="subSubCategoryPreference")
     */
    private $swapPreference;
       
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Product\ProductTaxonomy", mappedBy="subSubCategory")
     */
    private $productTaxonomies;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", options={"default":1})
     */
    private $isActive;
    
     public function __construct()
    {
        $this->productTaxonomies = new ArrayCollection();
        $this->swapPreference = new ArrayCollection(); 
        $this->subSubSubCategories = new ArrayCollection();
        
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
     * @return SubsubCategory
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
     * @return SubsubCategory
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
     * @return SubsubCategory
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
     * @return SubsubCategory
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
     * Set parentSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\SubCategory $parentSubCategory
     *
     * @return SubsubCategory
     */
    public function setParentSubCategory(\AppBundle\Entity\Taxonomy\SubCategory $parentSubCategory)
    {
        $this->parentSubCategory = $parentSubCategory;

        return $this;
    }

    /**
     * Get parentSubCategory
     *
     * @return \AppBundle\Entity\Taxonomy\SubCategory
     */
    public function getParentSubCategory()
    {
        return $this->parentSubCategory;
    }

    /**
     * Add subSubSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\SubsubsubCategory $subSubSubCategory
     *
     * @return SubsubCategory
     */
    public function addSubSubSubCategory(\AppBundle\Entity\Taxonomy\SubsubsubCategory $subSubSubCategory)
    {
        $this->subSubSubCategories[] = $subSubSubCategory;

        return $this;
    }

    /**
     * Remove subSubSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\SubsubsubCategory $subSubSubCategory
     */
    public function removeSubSubSubCategory(\AppBundle\Entity\Taxonomy\SubsubsubCategory $subSubSubCategory)
    {
        $this->subSubSubCategories->removeElement($subSubSubCategory);
    }

    /**
     * Get subSubSubCategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubSubSubCategories()
    {
        return $this->subSubSubCategories;
    }

    /**
     * Add productTaxonomy
     *
     * @param \AppBundle\Entity\Product\ProductTaxonomy $productTaxonomy
     *
     * @return SubsubCategory
     */
    public function addProductTaxonomy(\AppBundle\Entity\Product\ProductTaxonomy $productTaxonomy)
    {
        $this->productTaxonomies[] = $productTaxonomy;

        return $this;
    }

    /**
     * Remove productTaxonomy
     *
     * @param \AppBundle\Entity\Product\ProductTaxonomy $productTaxonomy
     */
    public function removeProductTaxonomy(\AppBundle\Entity\Product\ProductTaxonomy $productTaxonomy)
    {
        $this->productTaxonomies->removeElement($productTaxonomy);
    }

    /**
     * Get productTaxonomies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductTaxonomies()
    {
        return $this->productTaxonomies;
    }
}
