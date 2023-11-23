<?php

namespace App\ShoppingCart;

/**
 * 
 */
class Cart
{
    /**
     * @var array
     */
    private array $cart = [];

    /**
     * @var string
     */
    public string $id;

    /**
     * 
     */
    public function __construct()
    {
        $this->cart = [];
        $this->id = uniqid();
    }

    /**
     * @param CartItem $item
     * @return void
     */
    public function add(CartItem $item): void
    {
        array_push($this->cart, $item);
    }

    /**
     * @param array $items
     * @return void
     */
    public function addItems(array $items): void
    {
        $this->cart = array_merge($this->cart, $items);
    }

    /**
     * @return CartItem
     */
    public function getFirstItem(): CartItem
    {
        $item = reset($this->cart);

        if ($item instanceof CartItem) {
            return $item;
        }

        throw new CartIsEmptyException();
    }

    /**
     * @param string $id
     * @return void
     */
    public function remove(string $id): void
    {
        foreach ($this->cart as $key => $item) {
            if ($item->id == $id) {
                unset($this->cart[$key]);
            }
        }
    }

    /**
     * @return integer
     */
    public function count(): int
    {
        return count($this->cart);
    }

    /**
     * @return boolean
     */
    public function isEmpty(): bool
    {
        return empty($this->cart);
    }
}
