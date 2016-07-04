<?php
namespace Livraria;

return array(
    'router' => array(
        'routes' => array(

            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Livraria\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),

            'livraria-admin-interna' => array(
                'type' => 'Segment',
                'options' => array(
                        'route'    => '/admin/[:controller[/:action][/:id]]',
                    'defaults' => array(
                        'action'     => 'index',
                    ),
                    'constraints'   => array(
                        'id'    => '[0-9]+'
                    ),
                ),
            ),

                'livraria-admin' => array(
                    'type' => 'Segment',
                    'options' => array(
                        'route'    => '/admin/[:controller[/:action][/page/:page]]',
                        'defaults' => array(
                            'action'     => 'index',
                            'page'      => 1
                        ),
                    ),
                ),

            'livraria-admin-auth' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/admin/auth',
                    'defaults' => array(
                        'controller'     => 'livraria-admin\auth',
                        'action'     => 'index',

                    ),
                ),
            ),

            'livraria-admin-logout' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/admin/auth/logout',
                    'defaults' => array(
                        'controller'     => 'livraria-admin\auth',
                        'action'     => 'logout',

                    ),
                ),
            ),

        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'Livraria\Controller\Index'         => 'Livraria\Controller\IndexController',
            'categorias'                        => 'LivrariaAdmin\Controller\CategoriasController',
            'livros'                            =>  'LivrariaAdmin\Controller\LivrosController',
            'users'                             =>  'LivrariaAdmin\Controller\UsersController',
            'livraria-admin\auth'                   =>  'LivrariaAdmin\Controller\AuthController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/categorias',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'livraria/categorias/categorias' => __DIR__ . '/../view/livraria/categorias/categorias.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/categorias'             => __DIR__ . '/../view/error/categorias.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),

    'doctrine' => array(
        'driver' => array(
               __NAMESPACE__. '_driver' => array(
                   'class'  => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                   'cache'  => 'array',
                   'paths'  => array(__DIR__ . '/../src/'.__NAMESPACE__.'/Entity'),
               ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__.'\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
    ),

);
