<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 6/9/18
 * Time: 5:16 PM
 */

namespace App\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Usuario extends AbstractController {

    public function index(LoggerInterface $logger){
        $logger -> info('Index Usuario ... !');
    }

    public function crear(LoggerInterface $logger){
        $logger -> info('Crear Usuario ...!');
        return $this -> render('usuario/crear.html.twig',[]);
    }

    public function editar($id ,LoggerInterface $logger){
        $logger -> info('Editar Usuario ...!');
        return $this -> render('usuario/editar.html.twig',['id' => $id]);
    }

    public function eliminar($id, LoggerInterface $logger){
        $logger -> info('Eliminar Usuario ...!');
        return $this -> render('usuario/eliminar.html.twig',['id' => $id]);
    }

}