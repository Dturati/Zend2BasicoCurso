<?php

namespace LivrariaAdmin\Form;

use Zend\Form\Form;

class User extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('users');
        $this->setAttribute('method', 'post');

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
            'name' => 'email',
            'options' => array(
                'type' => 'email',
                'label' => 'email'
            ),
            'attributes' => array(
                'id' => 'nome',
                'placeholder' => 'Digite o email',
            )
        ));

        $this->add(array(
            'name' => 'password',
            'options' => array(
                'type' => 'password',
                'label' => 'senha'
            ),
            'attributes' => array(
                'id' => 'password',
                'type' => 'password',
            ),
        ));


        $this->add(array(
            'name' => 'submit',
            'type'  => 'Zend\Form\Element\Submit',
            'attributes'    => array(
                'value'    => 'Salvar',
                'class'     => 'btn-success'

            ),
        ));
    }


}