<?php
namespace Livraria\Service;

use Doctrine\ORM\EntityManager;
use Livraria\Entity\Configurator;

class User extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
            $this->entity =     'Livraria\Entity\User';
            //$this->service =    'Livraria\Service\Categoria';
    }

    public function update(array $data)
    {
        $entity = $this->em->getReference($this->entity,$data['id']);
        if(empty($data["password"])){
            unset($data["password"]);
        }
        $entity = Configurator::configure($entity,$data);
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

}