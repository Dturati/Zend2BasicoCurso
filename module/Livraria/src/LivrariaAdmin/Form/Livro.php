<?php
namespace LivrariaAdmin\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;

class Livro extends Form
{
    protected $em;
    protected $categorias;
    public function __construct($name = null, array $categorias = null)
    {
        parent::__construct('livro');

        $this->categorias = $categorias;
        $this->setAttribute('method','post');
        //$this->setInputFilter(new CategoriaFilter());

        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'Hidden'
            )
        ));

        $this->add(array(
           'name' => 'nome',
            'options' => array(
                'type' => 'text',
                'label' => 'nome'
            ),
            'attributes' => array(
                'id' => 'nome',
                'placeholder' => 'Digite o nome',
            )
        ));


        $categoria = new Select();
        $categoria->setLabel('Categoria')
                    ->setName('categoria')
                    ->setOptions(array(
                        'value_options' => $this->categorias
                        ));
        $this->add($categoria);

        $this->add(array(
            'name' => 'autor',
            'options' => array(
                'type' => 'text',
                'label' => 'Autor'
            ),
            'attributes' => array(
                'id' => 'autor',
                'placeholder' => 'Digite o autor',
            )
        ));

        $this->add(array(
            'name' => 'isbn',
            'options' => array(
                'type' => 'text',
                'label' => 'isbn'
            ),
            'attributes' => array(
                'id' => 'nome',
                'placeholder' => 'Digite o isbn',
            )
        ));

        $this->add(array(
            'name' => 'valor',
            'options' => array(
                'type' => 'float',
                'label' => 'Valor'
            ),
            'attributes' => array(
                'id' => 'valor',
                'placeholder' => 'Digite o Valor',
            )
        ));

        $this->add(array(
                'name' => 'submit',
                'type'  => 'Zend\Form\Element\Submit',
                'attributes'    => array(
                    'value'    => 'Salvar',
                    'class'     => 'btn-success'
                )
        ));
    }

}