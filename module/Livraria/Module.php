<?php

namespace Livraria;


use Livraria\Service\Categoria  as CategoriaService;
use Livraria\Service\Livro      as LivroService;
use LivrariaAdmin\Form\Livro    as LivroFrm;
use Livraria\Service\User       as UserService;
use Livraria\Auth\Adapter       as AuthAdapterService;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;
use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;

class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__.'Admin'  => __DIR__ . '/src/' . __NAMESPACE__."Admin",
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function init(ModuleManager $moduleManager)
    {

            $sharedEvents =  $moduleManager->getEventManager()->getSharedManager();
            $sharedEvents->attach('Zend\Mvc\Controller\AbstractActionController','dispatch',function($e){

                $auth = new AuthenticationService;

                $auth->setStorage(new SessionStorage('LivrariaAdmin'));

                $controller = $e->getTarget();
                $matchedRoute = $controller->getEvent()->getRouteMatch()->getMatchedRouteName();

                if(!$auth->hasIdentity() and ($matchedRoute == 'livraria-admin' or $matchedRoute == 'livraria-admin-interna')){

                    return $controller->redirect()->toRoute('livraria-admin-auth');
                }

            },99);
    }



    public function getServiceConfig(){
        return array(
            'factories' => array(
                'Livraria\Service\Categoria' => function($service){
                    return new CategoriaService($service->get('Doctrine\ORM\EntityManager'));
                },

                'Livraria\Service\Livro' => function($service){
                    return new LivroService($service->get('Doctrine\ORM\EntityManager'));
                },

                'Livraria\Service\User' => function($service){
                    return new UserService($service->get('Doctrine\ORM\EntityManager'));
                },

                'Livraria\Auth\Adapter' => function($service){
                    return new AuthAdapterService($service->get('Doctrine\ORM\EntityManager'));
                },

                'LivrariaAdmin\Form\Livro' => function($service){
                    $em = $service->get('Doctrine\ORM\EntityManager');
                    $repositoy = $em->getRepository('Livraria\Entity\Categoria');
                    $categorias = $repositoy->fetchPairs();
                    return new LivroFrm(null,$categorias);
                },
            ),
        );
    }

    public function getViewHelperConfig(){
        return array(
          'invokables' => array(
                'UserIdentity'  =>  'Livraria\View\Helper\UserIdentity'
          ),
        );
    }

}
