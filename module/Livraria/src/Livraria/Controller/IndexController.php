<?php
namespace Livraria\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Livraria\Model\CategoriaService;
class IndexController extends AbstractActionController
{
    public function indexAction()
    {

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Livraria\Entity\Categoria');
        $categorias = $repo->findAll();

       return new ViewModel(['categorias' => $categorias]);
    }

}