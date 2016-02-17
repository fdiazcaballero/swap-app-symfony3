<?php

namespace AppBundle\Entity\Taxonomy;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SubsubsubCategory
 *
 * @ORM\Table(name="subsubsub_category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Taxonomy\SubsubsubCategoryRepository")
 */
class SubsubsubCategory
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
     * @ORM\ManyToOne(targetEntity="SubsubCategory", inversedBy="subSubSubCategories")
     * @ORM\JoinColumn(name="parent_subsub_category_id", nullable=false, referencedColumnName="id")
     */
    private $parentSubSubCategory;

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
     * @ORM\OneToMany(targetEntity="FurtherSubCategory", mappedBy="parentSubSubSubCategory")
     */
    private $furtherSubCategories;
    
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Product\ProductTaxonomy", mappedBy="subSubSubCategory")
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
        $this->furtherSubCategories = new ArrayCollection();
        
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
     * @return SubsubsubCategory
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
     * @return SubsubsubCategory
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
     * @return SubsubsubCategory
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
     * @return SubsubsubCategory
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
     * Set parentSubSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\SubsubCategory $parentSubSubCategory
     *
     * @return SubsubsubCategory
     */
    public function setParentSubSubCategory(\AppBundle\Entity\Taxonomy\SubsubCategory $parentSubSubCategory)
    {
        $this->parentSubSubCategory = $parentSubSubCategory;

        return $this;
    }

    /**
     * Get parentSubSubCategory
     *
     * @return \AppBundle\Entity\Taxonomy\SubsubCategory
     */
    public function getParentSubSubCategory()
    {
        return $this->parentSubSubCategory;
    }

    /**
     * Add furtherSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\FurtherSubCategory $furtherSubCategory
     *
     * @return SubsubsubCategory
     */
    public function addFurtherSubCategory(\AppBundle\Entity\Taxonomy\FurtherSubCategory $furtherSubCategory)
    {
        $this->furtherSubCategories[] = $furtherSubCategory;

        return $this;
    }

    /**
     * Remove furtherSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\FurtherSubCategory $furtherSubCategory
     */
    public function removeFurtherSubCategory(\AppBundle\Entity\Taxonomy\FurtherSubCategory $furtherSubCategory)
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
     * Add productTaxonomy
     *
     * @param \AppBundle\Entity\Product\ProductTaxonomy $productTaxonomy
     *
     * @return SubsubsubCategory
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
