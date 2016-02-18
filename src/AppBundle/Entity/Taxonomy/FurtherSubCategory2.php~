<?php

namespace AppBundle\Entity\Taxonomy;

use Doctrine\ORM\Mapping as ORM;

/**
 * FurtherSubCategory2
 *
 * @ORM\Table(name="further_subcategory2")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Taxonomy\FurtherSubCategory2Repository")
 */
class FurtherSubCategory2
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
     * @ORM\ManyToOne(targetEntity="FurtherSubCategory", inversedBy="furtherSubCategories2")
     * @ORM\JoinColumn(name="parent_further_sub_category_id", nullable=false, referencedColumnName="id")
     */
    private $parentFurtherSubCategory;

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
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Product\ProductTaxonomy", mappedBy="furtherSubCategory2")
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
     * @return FurtherSubCategory2
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
     * @return FurtherSubCategory2
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
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return FurtherSubCategory2
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
     * Set parentFurtherSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\FurtherSubCategory $parentFurtherSubCategory
     *
     * @return FurtherSubCategory2
     */
    public function setParentFurtherSubCategory(\AppBundle\Entity\Taxonomy\FurtherSubCategory $parentFurtherSubCategory)
    {
        $this->parentFurtherSubCategory = $parentFurtherSubCategory;

        return $this;
    }

    /**
     * Get parentFurtherSubCategory
     *
     * @return \AppBundle\Entity\Taxonomy\FurtherSubCategory
     */
    public function getParentFurtherSubCategory()
    {
        return $this->parentFurtherSubCategory;
    }

    /**
     * Add productTaxonomy
     *
     * @param \AppBundle\Entity\Product\ProductTaxonomy $productTaxonomy
     *
     * @return FurtherSubCategory2
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
