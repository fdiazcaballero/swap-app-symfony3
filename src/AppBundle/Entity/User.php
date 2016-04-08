<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Product\Product", mappedBy="user")
     */
    private $products;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->products = new ArrayCollection();
    }

    /**
     * Add product
     *
     * @param \AppBundle\Entity\Product\Product $product
     *
     * @return User
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
}
