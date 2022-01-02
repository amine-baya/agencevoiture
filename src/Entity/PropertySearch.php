<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class PropertySearch {

    /**
     * @var int|null
     */
    private $maxPrice;

    /**
      * @var int|null
      * @Assert\Range(min=2, max=12)
     */
    private $minNbChevaux;


        /**
      * @var ArrayCollection
     */
    private $options;

    public function __construct()
    {
        $this->options = new ArrayCollection();
    }




     /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }


    /**
     * @param int|null $maxPrice
     * @return PropertySearch
     */
    public function setMaxPrice(int $maxPrice): PropertySearch
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }



    /**
    * @return int|null
    */
    public function getMinNbChevaux(): ?int
    {
        return $this->minNbChevaux;
    }


    /**
     * @param int|null $minNbChevaux
     * @return PropertySearch
     */
    public function setMinNbChevaux(int $minNbChevaux): PropertySearch
    {
        $this->minNbChevaux = $minNbChevaux;
        return $this;
    }




    /**
    * @return ArrayCollection
    */
    public function getOptions(): ArrayCollection
    {
        return $this->options;
    }


    /**
     * @param ArrayCollection $options
     */
    public function setOptions(ArrayCollection $options): void
    {
        $this->options = $options;
        
    }





















}