<?php

namespace App\Models;

use PDO;
use App\Entity\Item;

class ItemManager extends AbstractManager
{
    public const TABLE = 'item';

    /**
     * Insert new item in database
     * 
     * @param Item $item
     * 
     * @return int
     */
    public function insert(Item $item): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`title`) VALUES (:title)");
        $statement->bindValue('title', $item->getTitle(), PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update item in database
     * 
     * @param Item $item
     * 
     * @return Item
     */
    public function update(Item $item, $id): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $id, PDO::PARAM_INT);
        $statement->bindValue('title', $item->getTitle(), PDO::PARAM_STR);

        return $statement->execute();
    }
}