<?php


namespace MIS\Infrastructure\Repository;

use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use MIS\EntityOrm\ProductEntityORM;
abstract class BaseRepository
{
    protected $_em;
    protected $repository;

    public function __construct( string $repository)
    {
       $this->_em = entityManager();
       $this->repository = entityManager()->getRepository($repository);

    }

    public function _findBy(string $key,$value)
    {
       return $this->repository->findOneBy([$key => $value]);
    }

    public function _remove(object $o):bool
    {
        try {
            $this->_em->remove($o);
            $this->_em->flush();
            return true;
        } catch (OptimisticLockException | ORMException $e) {
            return false;
        }
    }

    /**
     * @param object $o
     * @throws ORMException
     */
    public function _persist(object $o)
    {
        try {

            if($o->getId() === null){
                $this->_em->persist($o);
            }
            $this->_em->flush();
        } catch (ORMException | OptimisticLockException $e) {

            throw $e;
        }

    }

    public function _findAll():?array
    {
        return $this->repository->findAll();
    }

}
