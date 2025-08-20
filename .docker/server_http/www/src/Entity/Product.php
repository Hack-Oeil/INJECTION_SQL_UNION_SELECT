<?php

namespace App\Entity;

use Yoop\EntityInterface;

class Product implements EntityInterface {

    private $id;

    private $title;

    private $description;

    private $price;

    private $stock;

    private $picture;
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
    

    /**
     * Get the value of title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle($title): self {
        $this->title = $title;
        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description): self {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Set the value of price
     */
    public function setPrice($price): self {
        $this->price = $price;
        return $this;
    }

    /**
     * Get the value of stock
     */
    public function getStock() {
        return $this->stock;
    }

    /**
     * Set the value of stock
     */
    public function setStock($stock): self {
        $this->stock = $stock;
        return $this;
    }

    /**
     * Get the value of picture
     */
    public function getPicture() {
        return $this->picture;
    }

    /**
     * Set the value of picture
     */
    public function setPicture($picture): self {
        $this->picture = $picture;
        return $this;
    }
}