<?php
namespace Livraria\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="categorias")
 * @ORM\Entity(repositoryClass="Livraria\Entity\CategoriaRepository")
 */

class Categoria
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue("AUTO")
     * @ORM\Column(type="integer")
     */
    protected  $id;

    /**
         * @ORM\Column(type="string",length=40)
     */
    protected $nome;


    /**
     * @ORM\OneToMany(targetEntity="Livraria\Entity\Livro",mappedBy="categoria")
     */
    protected $livros;


    public function __construct($options = null)
    {
        Configurator::configure($this,$options);
        $this->livros = new ArrayCollection();

    }

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function __toString()
    {
       return $this->nome;
    }

    public function toArray()
    {
        return array("id" => $this->getId(),
            "nome" => $this->getNome());
    }

    /**
     * @return mixed
     */
    public function getLivros()
    {
        return $this->livros;
    }

    /**
     * @param mixed $livros
     */
    public function setLivros($livros)
    {
        $this->livros = $livros;
    }


}