<?php

namespace App;

use App\ShoppingCart\Cart;
use PDO;

/**
 * 
 */
class Connection
{
    /**
     * @var PDO
     */
    public PDO $connection;

    /**
     * 
     */
    public function __construct()
    {
        $this->connection = new PDO('sqlite::memory:');

        $this->connection->exec(
            "CREATE TABLE carts(id TEXT PRIMARY KEY, data TEXT NOT NULL);"
        );
    }

    /**
     * @param Cart $cart
     * @return void
     */
    public function insert(Cart $cart): void
    {
        $data = base64_encode(
            serialize($cart)
        );

        $this->connection->exec(
            "INSERT INTO carts(id, data) VALUES('{$cart->id}', '{$data}')"
        );
    }

    /**
     * @param string $id
     * @return Cart|null
     */
    public function selectById(string $id): ?Cart
    {
        $query = $this->connection->query(
            "SELECT data FROM carts WHERE id = '{$id}'"
        );

        return unserialize(
            base64_decode($query->fetch(PDO::FETCH_ASSOC)['data'])
        );
    }
}
