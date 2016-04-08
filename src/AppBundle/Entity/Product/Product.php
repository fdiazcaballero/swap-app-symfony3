<?php
// src/AppBundle/Entity/Product/Product.php
namespace AppBundle\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Product\ProductRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Product
{
    /**
     * Use constants to define configuration options that rarely change instead
     * of specifying them in app/config/config.yml.
     * See http://symfony.com/doc/current/best_practices/configuration.html#constants-vs-configuration-options
     */
    const NUM_ITEMS = 10;
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
     /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\User", inversedBy="products")
     * @ORM\JoinColumn(name="user_id", nullable=false, referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=63)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;
    
     /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $years;
    
    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $months;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;   
    
    /**
     * @ORM\Column(type="boolean", options={"default":0}, nullable=true)
     */
    private $hasPhoto;
    
    /**
     * @ORM\OneToOne(targetEntity="SwapPreference")
     * @ORM\JoinColumn(name="swap_preference_id", nullable=true, referencedColumnName="id")
     * @Assert\Type(type="AppBundle\Entity\Product\SwawpPreference")
     * @Assert\Valid()
     */
    private $swapPreference;
    
     /**
     * @ORM\ManyToOne(targetEntity="ProductTaxonomy", inversedBy="products")
     * @ORM\JoinColumn(name="product_taxonomy_id", nullable=false, referencedColumnName="id")
     * @Assert\Type(type="AppBundle\Entity\Product\ProductTaxonomy")
     * @Assert\Valid()
     */
    private $productTaxonomy;
    
    /**
     * @ORM\ManyToOne(targetEntity="ProductLocation", inversedBy="products")
     * @ORM\JoinColumn(name="product_location_id", nullable=false, referencedColumnName="id")
     * @Assert\Type(type="AppBundle\Entity\Product\ProductLocation")
     * @Assert\Valid()
     */
    private $productLocation;
    
    /**
     * @ORM\ManyToOne(targetEntity="ProductCondition", inversedBy="products")
     * @ORM\JoinColumn(name="product_condition_id", nullable=false, referencedColumnName="id")
     * @Assert\Type(type="AppBundle\Entity\Product\ProductCondition")
     * @Assert\Valid()
     */
    private $productCondition;   
   
//     /**
//     * @ORM\Column(type="string", nullable=true)
//     * @Assert\NotBlank(message="Please, upload a picture.")
//     * @Assert\File(
//     *     maxSize = "1024k",
//     *     mimeTypes = {"application/pdf", "image/png"},
//     *     mimeTypesMessage = "Please upload a valid file"
//     * )
//     */
//    protected $picture;
    
     /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;
    
    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     *
     * @return Product
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
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
     * Set years
     *
     * @param integer $years
     *
     * @return Product
     */
    public function setYears($years)
    {
        $this->years = $years;

        return $this;
    }

    /**
     * Get years
     *
     * @return integer
     */
    public function getYears()
    {
        return $this->years;
    }

    /**
     * Set months
     *
     * @param integer $months
     *
     * @return Product
     */
    public function setMonths($months)
    {
        $this->months = $months;

        return $this;
    }

    /**
     * Get months
     *
     * @return integer
     */
    public function getMonths()
    {
        return $this->months;
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
    * @ORM\PrePersist
    */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
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

    /**
     * Set swapPreference
     *
     * @param \AppBundle\Entity\Product\SwapPreference $swapPreference
     *
     * @return Product
     */
    public function setSwapPreference(\AppBundle\Entity\Product\SwapPreference $swapPreference = null)
    {
        $this->swapPreference = $swapPreference;

        return $this;
    }

    /**
     * Get swapPreference
     *
     * @return \AppBundle\Entity\Product\SwapPreference
     */
    public function getSwapPreference()
    {
        return $this->swapPreference;
    }

    /**
     * Set productTaxonomy
     *
     * @param \AppBundle\Entity\Product\ProductTaxonomy $productTaxonomy
     *
     * @return Product
     */
    public function setProductTaxonomy(\AppBundle\Entity\Product\ProductTaxonomy $productTaxonomy)
    {
        $this->productTaxonomy = $productTaxonomy;

        return $this;
    }

    /**
     * Get productTaxonomy
     *
     * @return \AppBundle\Entity\Product\ProductTaxonomy
     */
    public function getProductTaxonomy()
    {
        return $this->productTaxonomy;
    }

    /**
     * Set productLocation
     *
     * @param \AppBundle\Entity\Product\ProductLocation $productLocation
     *
     * @return Product
     */
    public function setProductLocation(\AppBundle\Entity\Product\ProductLocation $productLocation)
    {
        $this->productLocation = $productLocation;

        return $this;
    }

    /**
     * Get productLocation
     *
     * @return \AppBundle\Entity\Product\ProductLocation
     */
    public function getProductLocation()
    {
        return $this->productLocation;
    }

    /**
     * Set productCondition
     *
     * @param \AppBundle\Entity\Product\ProductCondition $productCondition
     *
     * @return Product
     */
    public function setProductCondition(\AppBundle\Entity\Product\ProductCondition $productCondition)
    {
        $this->productCondition = $productCondition;

        return $this;
    }

    /**
     * Get productCondition
     *
     * @return \AppBundle\Entity\Product\ProductCondition
     */
    public function getProductCondition()
    {
        return $this->productCondition;
    }
    

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Product
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
