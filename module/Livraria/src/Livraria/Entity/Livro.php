<?php
namespace Livraria\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="livros")
 * @ORM\Entity(repositoryClass="Livraria\Entity\LivroRepository")
 */
class Livro{

    public function __construct($options = null)
    {
        Configurator::configure($this,$options);
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=200)
     */
    protected $nome;

    //targetEntity = entidade alvo
    /**
     * @ORM\ManyToOne(targetEntity="Livraria\Entity\Categoria",inversedBy="livro")
     * @ORM\JoinColumn(name="categoria",referencedColumnName="id")
     */
    protected $categoria;

    /**
     * @ORM\Column(type="string",length=200)
     */
    protected $autor;

    /**
     * @ORM\Column(type="string",length=200)
     */
    protected $isbn;

    /**
     * @ORM\Column(type="float")
     * @var float
     */
    protected $valor;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param string $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param string $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }



    public function toArray(){
        return array(
            'id'            => $this->getId(),
            'nome'          => $this->getNome(),
            'categoria'     => $this->getCategoria(),
            'valor'         => $this->getValor(),
            'isbn'          =>  $this->getIsbn(),
            'autor'         => $this->getAutor()
        );
    }

}