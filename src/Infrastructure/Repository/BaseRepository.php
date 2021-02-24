<?php


namespace MIS\Infrastructure\Repository;

use MIS\Infrastructure\Database\Database;

abstract class BaseRepository
{
    protected \PDO $connexion;
    protected string $table;
    protected string $entity;

    public function __construct()
    {
        $this->connexion = Database::getInstance();
    }

    public function _findBy(string $key,$value):?object
    {
        $stm = $this->connexion->prepare("SELECT * FROM {$this->table} as t WHERE  t.$key = ?");
        $stm->execute([$value]);

        $stm->setFetchMode(\PDO::FETCH_CLASS,$this->entity);

        $result = $stm->fetch();

        if($result === false) return null;

        return $result;

    }


    public function _remove($id):bool
    {
        $stm = $this->connexion->prepare(" DELETE FROM {$this->table} WHERE id = ? ");
        return $stm->execute([$id]);
    }

    public function _findAll():?array
    {
        $stm = $this->connexion->prepare(" SELECT * FROM {$this->table} LIMIT 100");
        $stm->execute();

        $result = $stm->fetchAll(\PDO::FETCH_CLASS,$this->entity);

        if($result === false) return null;

        return $result;
    }

}
