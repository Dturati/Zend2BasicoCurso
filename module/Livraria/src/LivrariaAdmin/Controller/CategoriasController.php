<?php
namespace LivrariaAdmin\Controller;

class CategoriasController extends AbstractController
{
    public function __construct()
    {
        $this->entity       =   'Livraria\Entity\Categoria';
        $this->service      =   'Livraria\Service\Categoria';
        $this->form         =   'LivrariaAdmin\Form\Categoria';
        $this->controller   =   'categorias';
        $this->route         =  'livraria-admin';
    }


}