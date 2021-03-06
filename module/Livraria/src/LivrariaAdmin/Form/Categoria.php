<?php
namespace LivrariaAdmin\Form;

use Zend\Form\Form;

class Categoria extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('categoria');
        $this->setAttribute('method','post');
        $this->setInputFilter(new CategoriaFilter());


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