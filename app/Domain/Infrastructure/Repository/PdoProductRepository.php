<?php

namespace App\Domain\Infrastructure\Repository;

use App\Domain\Infrastructure\Persistence\ConnectionCreator;
use App\Domain\Model\Product;
use App\Domain\Repository\ProductRepository;
use PDO;

class PdoProductRepository implements ProductRepository
{
    private PDO $connection;
    CONST TABLE = 'tb_products';
    public function __construct()
    {
        $this->connection = ConnectionCreator::CreateConnection();
    }

    public function save(Product $product): bool
    {
        if($product->getId() === null){
            return $this->insert($product);
        }
        return $this->update($product);
    }

    public function insert(Product $product): bool
    {
        $insertProductQuery = 'INSERT INTO ' . SELF::TABLE . ' (nome, valor, qtd) VALUES (:name, :value, :quantity);';
        $stmt = $this->connection->prepare($insertProductQuery);
        $stmt->bindValue('name', $product->getName());
        $stmt->bindValue('value', $product->getValue());
        $stmt->bindValue('quantity', $product->getQuantity());
        return $stmt->execute();
    }

    public function update(Product $product): bool
    {
        $updateProductQuery = 'UPDATE ' . SELF::TABLE . ' SET nome=:name, valor=:value, qtd=:quantity WHERE id = :id;';
        $stmt = $this->connection->prepare($updateProductQuery);
        $stmt->bindValue('name', $product->getName());
        $stmt->bindValue('quantity', $product->getQuantity());
        $stmt->bindValue('value', $product->getValue());
        $stmt->bindValue('id', $product->getId());
        return $stmt->execute();
    }

    public function delete($id): bool
    {
        $deleteQuery = 'DELETE FROM ' . SELF::TABLE . ' WHERE ID = :id;';
        $stmt = $this->connection->prepare($deleteQuery);
        $stmt->bindValue('id', $id);
        return $stmt->execute();
    }

    public function hydrateProductList(\PDOStatement $stmt): array
        {
            $productDataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $productList = [];
            foreach($productDataList as $productData){
                $productList[] = new Product(
                    $productData['id'],
                    $productData['nome'],
                    $productData['valor'],
                    $productData['qtd']
                );
            }
            return $productList;
        }

    public function allProducts(): array
    {
        $allProductsQuery = 'SELECT * FROM ' . SELF::TABLE . ';';
        $stmt = $this->connection->query($allProductsQuery);
        return $this->hydrateProductList($stmt);
    }


    public function findOneById($id): Product
    {
        $findByIdQuery = 'SELECT * FROM ' . SELF::TABLE . ' WHERE id = :id';
        $stmt = $this->connection->prepare($findByIdQuery);
        $stmt->bindValue('id', $id);
        $stmt->execute();
        $productData = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Product(
            $productData['id'],
            $productData['nome'],
            $productData['valor'],
            $productData['qtd']

        );
    }
}