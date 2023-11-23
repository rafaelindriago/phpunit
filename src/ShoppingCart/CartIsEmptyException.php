<?php

namespace App\ShoppingCart;

use Exception;

class CartIsEmptyException extends Exception
{
    public function __construct()
    {
        parent::__construct("The cart is empty.");
    }
}
