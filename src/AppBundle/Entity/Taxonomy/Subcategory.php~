<?php

namespace AppBundle\Entity\Taxonomy;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SubCategory
 *
 * @ORM\Table(name="sub_category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Taxonomy\SubCategoryRepository")
 */
class SubCategory
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
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="subCategories")
     * @ORM\JoinColumn(name="parent_category_id", nullable=false, referencedColumnName="id")
     */
    private $parentCategory;

    /**
     * @ORM\Column(type="string", length=63, unique=true)
     */
    private $name;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;
    
    /**
     * @ORM\OneToMany(targetEntity="SubsubCategory", mappedBy="parentSubCategory")
     */
    private $subSubCategories;
    
    /**
     * @ORM\Column(name="swap_preference", nullable=true, options={"default":null})
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Product\SwapPreference", mappedBy="subCategoryPreference")
     */
    private $swapPreference;
    
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Product\ProductTaxonomy", mappedBy="subCategory")
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
        $this->subSubCategories = new ArrayCollection();
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
     * @return SubCategory
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
     * @return SubCategory
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
     * @return SubCategory
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
     * @return SubCategory
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
     * Set parentCategory
     *
     * @param \AppBundle\Entity\Taxonomy\Category $parentCategory
     *
     * @return SubCategory
     */
    public function setParentCategory(\AppBundle\Entity\Taxonomy\Category $parentCategory)
    {
        $this->parentCategory = $parentCategory;

        return $this;
    }

    /**
     * Get parentCategory
     *
     * @return \AppBundle\Entity\Taxonomy\Category
     */
    public function getParentCategory()
    {
        return $this->parentCategory;
    }

    /**
     * Add subSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\SubsubCategory $subSubCategory
     *
     * @return SubCategory
     */
    public function addSubSubCategory(\AppBundle\Entity\Taxonomy\SubsubCategory $subSubCategory)
    {
        $this->subSubCategories[] = $subSubCategory;

        return $this;
    }

    /**
     * Remove subSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\SubsubCategory $subSubCategory
     */
    public function removeSubSubCategory(\AppBundle\Entity\Taxonomy\SubsubCategory $subSubCategory)
    {
        $this->subSubCategories->removeElement($subSubCategory);
    }

    /**
     * Get subSubCategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubSubCategories()
    {
        return $this->subSubCategories;
    }

    /**
     * Add productTaxonomy
     *
     * @param \AppBundle\Entity\Product\ProductTaxonomy $productTaxonomy
     *
     * @return SubCategory
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
