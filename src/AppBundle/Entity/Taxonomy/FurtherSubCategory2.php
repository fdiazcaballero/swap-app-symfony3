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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
