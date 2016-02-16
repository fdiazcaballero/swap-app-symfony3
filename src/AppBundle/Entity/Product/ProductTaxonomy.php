<?php

namespace AppBundle\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ProductTaxonomy
 *
 * @ORM\Table(name="product_taxonomy")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Product\ProductTaxonomyRepository")
 */
class ProductTaxonomy
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
     * @ORM\OneToMany(targetEntity="Product", mappedBy="productTaxonomy")
     */
    private $products;
    
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Taxonomy\Category", inversedBy="productTaxonomies")
     * @ORM\JoinColumn(name="category_id", nullable=false, referencedColumnName="id")
     */
    private $category;
        
     /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Taxonomy\Subcategory", inversedBy="productTaxonomies")
     * @ORM\JoinColumn(name="subcategory_id", nullable=false, referencedColumnName="id")
     */
    private $subCategory;
    
     /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Taxonomy\Subsubcategory", inversedBy="productTaxonomies")
     * @ORM\JoinColumn(name="subsubcategory_id", nullable=true, referencedColumnName="id")
     */
    private $subSubCategory;
    
        /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Taxonomy\Subsubsubcategory", inversedBy="productTaxonomies")
     * @ORM\JoinColumn(name="subsubsubcategory_id", nullable=true, referencedColumnName="id")
     */
    private $subSubSubcategory;
    
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Taxonomy\Furthersubcategory", inversedBy="productTaxonomies")
     * @ORM\JoinColumn(name="furthersubcategory_id", nullable=true, referencedColumnName="id")
     */
    private $furtherSubCategory;
    
    public function __construct()
    {
        $this->products = new ArrayCollection();
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
     * Add product
     *
     * @param \AppBundle\Entity\Product\Product $product
     *
     * @return ProductTaxonomy
     */
    public function addProduct(\AppBundle\Entity\Product\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \AppBundle\Entity\Product\Product $product
     */
    public function removeProduct(\AppBundle\Entity\Product\Product $product)
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

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Taxonomy\Category $category
     *
     * @return ProductTaxonomy
     */
    public function setCategory(\AppBundle\Entity\Taxonomy\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Taxonomy\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set subCategory
     *
     * @param \AppBundle\Entity\Taxonomy\Subcategory $subCategory
     *
     * @return ProductTaxonomy
     */
    public function setSubCategory(\AppBundle\Entity\Taxonomy\Subcategory $subCategory)
    {
        $this->subCategory = $subCategory;

        return $this;
    }

    /**
     * Get subCategory
     *
     * @return \AppBundle\Entity\Taxonomy\Subcategory
     */
    public function getSubCategory()
    {
        return $this->subCategory;
    }

    /**
     * Set subSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\Subsubcategory $subSubCategory
     *
     * @return ProductTaxonomy
     */
    public function setSubSubCategory(\AppBundle\Entity\Taxonomy\Subsubcategory $subSubCategory = null)
    {
        $this->subSubCategory = $subSubCategory;

        return $this;
    }

    /**
     * Get subSubCategory
     *
     * @return \AppBundle\Entity\Taxonomy\Subsubcategory
     */
    public function getSubSubCategory()
    {
        return $this->subSubCategory;
    }

    /**
     * Set subSubSubcategory
     *
     * @param \AppBundle\Entity\Taxonomy\Subsubsubcategory $subSubSubcategory
     *
     * @return ProductTaxonomy
     */
    public function setSubSubSubcategory(\AppBundle\Entity\Taxonomy\Subsubsubcategory $subSubSubcategory = null)
    {
        $this->subSubSubcategory = $subSubSubcategory;

        return $this;
    }

    /**
     * Get subSubSubcategory
     *
     * @return \AppBundle\Entity\Taxonomy\Subsubsubcategory
     */
    public function getSubSubSubcategory()
    {
        return $this->subSubSubcategory;
    }

    /**
     * Set furtherSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\Furthersubcategory $furtherSubCategory
     *
     * @return ProductTaxonomy
     */
    public function setFurtherSubCategory(\AppBundle\Entity\Taxonomy\Furthersubcategory $furtherSubCategory = null)
    {
        $this->furtherSubCategory = $furtherSubCategory;

        return $this;
    }

    /**
     * Get furtherSubCategory
     *
     * @return \AppBundle\Entity\Taxonomy\Furthersubcategory
     */
    public function getFurtherSubCategory()
    {
        return $this->furtherSubCategory;
    }
}
