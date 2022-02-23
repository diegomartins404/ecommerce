<?php

namespace App\Domain\Repository;

use App\Domain\Model\Product;

interface ProductRepository
{
    public function save(Product $product): bool;
    public function insert(Product $product): bool;
    public function update(Product $product): bool;
    public function allProducts(): array;
    public function hydrateProductList(\PDOStatement $stmt): array;

    public function findOneById(int $id): Product;

    public function delete(int $id): bool;
}