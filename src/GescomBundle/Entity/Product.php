<?php

namespace GescomBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use GescomBundle\Entity\Category;
use GescomBundle\Entity\Brand;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="GescomBundle\Repository\ProductRepository")
 */
class Product
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var Brand
     *
     * @ORM\ManyToOne(targetEntity="Brand", inversedBy="products")
     */
    private $brand;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     */
    private $category;

    /**
     * @var ProductSupplier
     *
     * @ORM\OneToMany(targetEntity="ProductSupplier", mappedBy="product", cascade={"remove"})
     */
    private $productSupplier;

    /**
     * @var boolean $checkToDelete
     * @Assert\IsTrue(message="The token is invalid")
     */
    private $checkToDelete;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productSupplier = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param \GescomBundle\Entity\Category $category
     *
     * @return Product
     */
    public function setCategory(\GescomBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \GescomBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Getter image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Setter image
     *
     * @param string $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Getter brand
     *
     * @return \GescomBundle\Entity\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Setter brand
     *
     * @param Brand|null $brand
     * @return $this
     */
    public function setBrand(\GescomBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Add productSupplier
     *
     * @param \GescomBundle\Entity\ProductSupplier $productSupplier
     *
     * @return Product
     */
    public function addProductSupplier(\GescomBundle\Entity\ProductSupplier $productSupplier)
    {
        $this->productSupplier[] = $productSupplier;

        return $this;
    }

    /**
     * Remove productSupplier
     *
     * @param \GescomBundle\Entity\ProductSupplier $productSupplier
     */
    public function removeProductSupplier(\GescomBundle\Entity\ProductSupplier $productSupplier)
    {
        $this->productSupplier->removeElement($productSupplier);
    }

    /**
     * Get productSupplier
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductSupplier()
    {
        return $this->productSupplier;
    }

    /**
     * Reset productSupplier
     */
    public function resetProductSupplier(){
        $this->productSupplier = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return bool
     */
    public function isCheckToDelete()
    {
        return $this->checkToDelete;
    }

    /**
     * @param bool $checkToDelete
     */
    public function setCheckToDelete($checkToDelete)
    {
        $this->checkToDelete = $checkToDelete;
    }

}
