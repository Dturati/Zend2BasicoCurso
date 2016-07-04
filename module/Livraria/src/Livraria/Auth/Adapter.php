<?php
namespace Livraria\Auth;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use Doctrine\ORM\EntityManager;

class Adapter implements AdapterInterface
{
    /**
     * @var EntityManager
     */
    protected $em;
    protected $userName;
    protected $password;

        public function __construct(EntityManager $em)
        {
            $this->em = $em;
        }

    /**
     * @return EntityManager
     */
    public function getEm()
    {
        return $this->em;
    }

    /**
     * @param EntityManager $em
     */
    public function setEm($em)
    {
        $this->em = $em;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return  $this;
    }

    public function authenticate()
    {
        $repositiry = $this->em->getRepository('Livraria\Entity\User');
        $user = $repositiry->findByEmailAndPassword($this->getUserName(),$this->getPassword());

        if($user){
            return new Result(Result::SUCCESS,array('user' => $user),array('OK'));
        }else{
            return new Result(Result::FAILURE_CREDENTIAL_INVALID,null,array());
        }
    }


}
