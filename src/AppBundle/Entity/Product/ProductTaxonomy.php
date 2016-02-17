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
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Taxonomy\SubCategory", inversedBy="productTaxonomies")
     * @ORM\JoinColumn(name="sub_category_id", nullable=false, referencedColumnName="id")
     */
    private $subCategory;
    
     /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Taxonomy\SubsubCategory", inversedBy="productTaxonomies")
     * @ORM\JoinColumn(name="subsubcategory_id", nullable=true, referencedColumnName="id")
     */
    private $subSubCategory;
    
        /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Taxonomy\SubsubsubCategory", inversedBy="productTaxonomies")
     * @ORM\JoinColumn(name="subsubsub_category_id", nullable=true, referencedColumnName="id")
     */
    private $subSubSubCategory;
    
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Taxonomy\FurtherSubCategory", inversedBy="productTaxonomies")
     * @ORM\JoinColumn(name="further_sub_category_id", nullable=true, referencedColumnName="id")
     */
    private $furtherSubCategory;
    
    public function __construct()
    {
        $this->products = new ArrayCollection();
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
     * @param \AppBundle\Entity\Taxonomy\SubCategory $subCategory
     *
     * @return ProductTaxonomy
     */
    public function setSubCategory(\AppBundle\Entity\Taxonomy\SubCategory $subCategory)
    {
        $this->subCategory = $subCategory;

        return $this;
    }

    /**
     * Get subCategory
     *
     * @return \AppBundle\Entity\Taxonomy\SubCategory
     */
    public function getSubCategory()
    {
        return $this->subCategory;
    }

    /**
     * Set subSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\SubsubCategory $subSubCategory
     *
     * @return ProductTaxonomy
     */
    public function setSubSubCategory(\AppBundle\Entity\Taxonomy\SubsubCategory $subSubCategory = null)
    {
        $this->subSubCategory = $subSubCategory;

        return $this;
    }

    /**
     * Get subSubCategory
     *
     * @return \AppBundle\Entity\Taxonomy\SubsubCategory
     */
    public function getSubSubCategory()
    {
        return $this->subSubCategory;
    }

    /**
     * Set subSubSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\SubsubsubCategory $subSubSubCategory
     *
     * @return ProductTaxonomy
     */
    public function setSubSubSubCategory(\AppBundle\Entity\Taxonomy\SubsubsubCategory $subSubSubCategory = null)
    {
        $this->subSubSubCategory = $subSubSubCategory;

        return $this;
    }

    /**
     * Get subSubSubCategory
     *
     * @return \AppBundle\Entity\Taxonomy\SubsubsubCategory
     */
    public function getSubSubSubCategory()
    {
        return $this->subSubSubCategory;
    }

    /**
     * Set furtherSubCategory
     *
     * @param \AppBundle\Entity\Taxonomy\FurtherSubCategory $furtherSubCategory
     *
     * @return ProductTaxonomy
     */
    public function setFurtherSubCategory(\AppBundle\Entity\Taxonomy\FurtherSubCategory $furtherSubCategory = null)
    {
        $this->furtherSubCategory = $furtherSubCategory;

        return $this;
    }

    /**
     * Get furtherSubCategory
     *
     * @return \AppBundle\Entity\Taxonomy\FurtherSubCategory
     */
    public function getFurtherSubCategory()
    {
        return $this->furtherSubCategory;
    }
}
