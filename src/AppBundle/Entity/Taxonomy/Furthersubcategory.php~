<?php

namespace AppBundle\Entity\Taxonomy;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Furthersubcategory
 *
 * @ORM\Table(name="furthersubcategory")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Taxonomy\FurthersubcategoryRepository")
 */
class Furthersubcategory
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
     * @ORM\ManyToOne(targetEntity="Subsubsubcategory", inversedBy="FurtherSubCategories")
     * @ORM\JoinColumn(name="parent_subsubsubcategory_id", nullable=false, referencedColumnName="id")
     */
    private $parentSubSubSubcategory;

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
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Product\SwapPreference", mappedBy="furtherSubcategoryPreference")
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
     * @return Furthersubcategory
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
     * @return Furthersubcategory
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
     * @return Furthersubcategory
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
     * @return Furthersubcategory
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
     * Set parentSubSubSubcategory
     *
     * @param \AppBundle\Entity\Subsubsubcategory $parentSubSubSubcategory
     *
     * @return Furthersubcategory
     */
    public function setParentSubSubSubcategory(\AppBundle\Entity\Subsubsubcategory $parentSubSubSubcategory)
    {
        $this->parentSubSubSubcategory = $parentSubSubSubcategory;

        return $this;
    }

    /**
     * Get parentSubSubSubcategory
     *
     * @return \AppBundle\Entity\Subsubsubcategory
     */
    public function getParentSubSubSubcategory()
    {
        return $this->parentSubSubSubcategory;
    }

    /**
     * Add productTaxonomy
     *
     * @param \AppBundle\Entity\Product\ProductTaxonomy $productTaxonomy
     *
     * @return Furthersubcategory
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
