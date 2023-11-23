<?php

namespace App\ShoppingCart;

/**
 * 
 */
class CartItem
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $amount;

    /**
     * @var string
     */
    public string $id;

    /**
     * @param string $name
     * @param string $amount
     */
    public function __construct(string $name, string $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->id = uniqid();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }
}
