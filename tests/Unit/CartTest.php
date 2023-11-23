<?php

namespace Tests\Unit;

use App\Connection;
use App\ShoppingCart\Cart;
use App\ShoppingCart\CartIsEmptyException;
use App\ShoppingCart\CartItem;
use PHPUnit\Framework\TestCase;

/**
 * 
 */
class CartTest extends TestCase
{
    /**
     * @var Cart
     */
    protected Cart $cart;

    /**
     * @var Connection
     */
    protected Connection $connection;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->cart = new Cart();
        $this->connection = new Connection();
    }

    /**
     * @test
     * @testdox Crea un carrito de compra
     *
     * @return void
     */
    public function testItCreatesACart(): void
    {
        $item = new CartItem("Mouse", 20);

        $this->assertEquals(0, $this->cart->count());

        $this->cart->add($item);

        $this->assertEquals(1, $this->cart->count());
    }

    /**
     * @test
     *
     * @return void
     */
    public function testItAddsMultiplesItems(): void
    {
        $items = [];

        $this->assertEquals(0, $this->cart->count());

        for ($i = 0; $i < 5; $i++) {
            array_push($items, new CartItem("Mouse", 20));
        }

        $this->cart->addItems($items);

        $this->assertEquals(5, $this->cart->count());
    }

    /**
     * @test
     *
     * @return void
     */
    public function testIsEmpty(): void
    {
        $this->assertTrue($this->cart->isEmpty());
    }

    /**
     * @test
     *
     * @return void
     */
    public function testItThrowsACartIsEmptyException(): void
    {
        $this->expectException(CartIsEmptyException::class);

        $this->cart->getFirstItem();
    }

    /**
     * @test
     *
     * @return void
     */
    public function testItRemovesAnItem(): void
    {
        $item = new CartItem("Mouse", 20);

        $this->cart->add($item);

        $this->assertEquals(1, $this->cart->count());

        $this->cart->remove($item->id);

        $this->assertTrue($this->cart->isEmpty());
    }

    /**
     * @test
     *
     * @return void
     */
    public function testItStoresACart(): void
    {
        $this->connection->insert($this->cart);

        $cart = $this->connection->selectById($this->cart->id);

        $this->assertEquals($this->cart, $cart);
    }
}
