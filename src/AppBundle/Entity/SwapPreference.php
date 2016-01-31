<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SwapPreference
 *
 * @ORM\Table(name="swap_preference")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SwapPreferenceRepository")
 */
class SwapPreference
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
     * @ORM\OneToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="swapPreference1")
     * @ORM\JoinColumn(name="category_preference_1", referencedColumnName="id")
     */
    protected $categoryPreference1;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="swapPreference2")
     * @ORM\JoinColumn(name="category_preference_2", nullable=true, referencedColumnName="id")
     */
    protected $categoryPreference2;


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
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return SwapPreference
     */
    public function setProduct(\AppBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set categoryPreference1
     *
     * @param \AppBundle\Entity\Category $categoryPreference1
     *
     * @return SwapPreference
     */
    public function setCategoryPreference1(\AppBundle\Entity\Category $categoryPreference1 = null)
    {
        $this->categoryPreference1 = $categoryPreference1;

        return $this;
    }

    /**
     * Get categoryPreference1
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategoryPreference1()
    {
        return $this->categoryPreference1;
    }

    /**
     * Set categoryPreference2
     *
     * @param \AppBundle\Entity\Category $categoryPreference2
     *
     * @return SwapPreference
     */
    public function setCategoryPreference2(\AppBundle\Entity\Category $categoryPreference2 = null)
    {
        $this->categoryPreference2 = $categoryPreference2;

        return $this;
    }

    /**
     * Get categoryPreference2
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategoryPreference2()
    {
        return $this->categoryPreference2;
    }
}
