<?php

namespace App\Entity;

class PropertySearch {

    /**
     * @var int|null
     */
    private $maxPrice;

    /**
      * @var int|null
     */
    private $minNbChevaux;




     /**
     * return int|null
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
    * return int|null
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


















}