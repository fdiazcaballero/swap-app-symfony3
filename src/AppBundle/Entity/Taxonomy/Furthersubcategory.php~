<?php

namespace AppBundle\Entity\Taxonomy;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * FurtherSubCategory
 *
 * @ORM\Table(name="further_subcategory")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Taxonomy\FurtherSubCategoryRepository")
 */
class FurtherSubCategory
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
     * @ORM\ManyToOne(targetEntity="SubsubsubCategory", inversedBy="furtherSubCategories")
     * @ORM\JoinColumn(name="parent_subsubsub_category_id", nullable=false, referencedColumnName="id")
     */
    private $parentSubSubSubCategory;
    
    /**
     * @ORM\OneToMany(targetEntity="FurtherSubCategory2", mappedBy="parentFurtherSubCategory")
     */
    private $furtherSubCategories2;

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
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Product\SwapPreference", mappedBy="furtherSubCategoryPreference")
     */
    private $swapPreference;
        
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Product\ProductTaxonomy", mappedBy="furtherSubCategory")
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
     * @return FurtherSubCategory
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
     * @return FurtherSubCategory
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
     * @return FurtherSubCategory
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
     * @return FurtherSubCategory
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
     * Set parentSubSubSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\SubsubsubCategory $parentSubSubSubCategory
     *
     * @return FurtherSubCategory
     */
    public function setParentSubSubSubCategory(\AppBundle\Entity\Taxonomy\SubsubsubCategory $parentSubSubSubCategory)
    {
        $this->parentSubSubSubCategory = $parentSubSubSubCategory;

        return $this;
    }

    /**
     * Get parentSubSubSubCategory
     *
     * @return \AppBundle\Entity\Taxonomy\SubsubsubCategory
     */
    public function getParentSubSubSubCategory()
    {
        return $this->parentSubSubSubCategory;
    }

    /**
     * Add productTaxonomy
     *
     * @param \AppBundle\Entity\Product\ProductTaxonomy $productTaxonomy
     *
     * @return FurtherSubCategory
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

    /**
     * Add furtherSubCategories2
     *
     * @param \AppBundle\Entity\Taxonomy\FurtherSubCategory2 $furtherSubCategories2
     *
     * @return FurtherSubCategory
     */
    public function addFurtherSubCategories2(\AppBundle\Entity\Taxonomy\FurtherSubCategory2 $furtherSubCategories2)
    {
        $this->furtherSubCategories2[] = $furtherSubCategories2;

        return $this;
    }

    /**
     * Remove furtherSubCategories2
     *
     * @param \AppBundle\Entity\Taxonomy\FurtherSubCategory2 $furtherSubCategories2
     */
    public function removeFurtherSubCategories2(\AppBundle\Entity\Taxonomy\FurtherSubCategory2 $furtherSubCategories2)
    {
        $this->furtherSubCategories2->removeElement($furtherSubCategories2);
    }

    /**
     * Get furtherSubCategories2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFurtherSubCategories2()
    {
        return $this->furtherSubCategories2;
    }
}
