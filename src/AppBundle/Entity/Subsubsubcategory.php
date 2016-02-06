<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subsubsubcategory
 *
 * @ORM\Table(name="subsubsubcategory")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubsubsubcategoryRepository")
 */
class Subsubsubcategory
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
     * @ORM\ManyToOne(targetEntity="Subsubcategory", inversedBy="subSubSubCategories")
     * @ORM\JoinColumn(name="parent_subsubcategory_id", nullable=false, referencedColumnName="id")
     */
    private $parentSubcategory;

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
     * @ORM\OneToMany(targetEntity="SwapPreference", mappedBy="subsubsubcategoryPreference")
     */
    private $swapPreference;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", options={"default":1})
     */
    private $isActive;


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
     * @return Subsubsubcategory
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
     * @return Subsubsubcategory
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
     * @return Subsubsubcategory
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
     * @return Subsubsubcategory
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
     * Set parentSubcategory
     *
     * @param \AppBundle\Entity\Subsubcategory $parentSubcategory
     *
     * @return Subsubsubcategory
     */
    public function setParentSubcategory(\AppBundle\Entity\Subsubcategory $parentSubcategory)
    {
        $this->parentSubcategory = $parentSubcategory;

        return $this;
    }

    /**
     * Get parentSubcategory
     *
     * @return \AppBundle\Entity\Subsubcategory
     */
    public function getParentSubcategory()
    {
        return $this->parentSubcategory;
    }
}
