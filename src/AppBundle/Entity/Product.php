<?php
// src/AppBundle/Entity/Product.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
     /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="products")
     * @ORM\JoinColumn(name="user_id", nullable=false, referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(type="boolean", options={"default":0})
     */
    private $isFree;
    
    /**
     * @ORM\Column(type="boolean", options={"default":0})
     */
    private $hasPhoto;
    
    /**
     * @ORM\OneToOne(targetEntity="SwapPreference")
     * @ORM\JoinColumn(name="swap_preference_id", nullable=true, referencedColumnName="id")
     */
    private $swapPreference;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", nullable=false, referencedColumnName="id")
     */
    private $category;

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
     * @return Product
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
     * @return Product
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
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Product
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    /**
    * @ORM\PrePersist
    */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Product
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set isFree
     *
     * @param boolean $isFree
     *
     * @return Product
     */
    public function setIsFree($isFree)
    {
        $this->isFree = $isFree;

        return $this;
    }

    /**
     * Get isFree
     *
     * @return boolean
     */
    public function getIsFree()
    {
        return $this->isFree;
    }

    /**
     * Set swapPreference
     *
     * @param \AppBundle\Entity\SwapPreference $swapPreference
     *
     * @return Product
     */
    public function setSwapPreference(\AppBundle\Entity\SwapPreference $swapPreference = null)
    {
        $this->swapPreference = $swapPreference;

        return $this;
    }

    /**
     * Get swapPreference
     *
     * @return \AppBundle\Entity\SwapPreference
     */
    public function getSwapPreference()
    {
        return $this->swapPreference;
    }

    /**
     * Set hasPhoto
     *
     * @param boolean $hasPhoto
     *
     * @return Product
     */
    public function setHasPhoto($hasPhoto)
    {
        $this->hasPhoto = $hasPhoto;

        return $this;
    }

    /**
     * Get hasPhoto
     *
     * @return boolean
     */
    public function getHasPhoto()
    {
        return $this->hasPhoto;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Product
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
