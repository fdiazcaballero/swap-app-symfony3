<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     */
    private $products;
    
    /**
     * @ORM\Column(name="swap_preference_1", nullable=true, options={"default":null})
     * @ORM\OneToMany(targetEntity="Category", mappedBy="categoryPreference1")
     */
    private $swapPreference1;
    
     /**
     * @ORM\Column(name="swap_preference_2", nullable=true, options={"default":null})
     * @ORM\OneToMany(targetEntity="Category", mappedBy="categoryPreference2")
     */
    private $swapPreference2;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->swapPreference1 = new ArrayCollection();
        $this->swapPreference2 = new ArrayCollection();
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
     * @return Category
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
     * Add product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return Category
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

    /**
     * Set swapPreference1
     *
     * @param string $swapPreference1
     *
     * @return Category
     */
    public function setSwapPreference1($swapPreference1)
    {
        $this->swapPreference1 = $swapPreference1;

        return $this;
    }

    /**
     * Get swapPreference1
     *
     * @return string
     */
    public function getSwapPreference1()
    {
        return $this->swapPreference1;
    }

    /**
     * Set swapPreference2
     *
     * @param string $swapPreference2
     *
     * @return Category
     */
    public function setSwapPreference2($swapPreference2)
    {
        $this->swapPreference2 = $swapPreference2;

        return $this;
    }

    /**
     * Get swapPreference2
     *
     * @return string
     */
    public function getSwapPreference2()
    {
        return $this->swapPreference2;
    }
}
