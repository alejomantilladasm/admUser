<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 7/9/18
 * Time: 2:37 PM
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity()
 * @ORM\Table(name="rol")
 */
class Rol{

    public function __construct(){

        $this -> usuarios = new ArrayCollection();

    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $nemonico;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Usuario", mappedBy="rol")
     */
    private $usuarios;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getNemonico()
    {
        return $this->nemonico;
    }

    /**
     * @param mixed $nemonico
     */
    public function setNemonico($nemonico)
    {
        $this->nemonico = $nemonico;
    }

    /**
     * @return mixed
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    /**
     * @param mixed $usuarios
     */
    public function setUsuarios($usuarios)
    {
        $this->usuarios = $usuarios;
    }



}