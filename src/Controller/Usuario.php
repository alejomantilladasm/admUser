<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 6/9/18
 * Time: 5:16 PM
 */

namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Usuario extends AbstractController {

    /**
     * @Route("/usuario",name ="usuario_home")
     *
     */
    public function index(LoggerInterface $logger, EntityManagerInterface $em){
        $logger -> info('Index Usuario ... !');


        $usuarios = $em -> getRepository(\App\Entity\Usuario::class) ->findAll();
        foreach ($usuarios as $usuario){
            $logger ->info('- > '.$usuario -> getNombre());
        }

        //DQL
        $logger -> info('Result: ');
        $query = $em -> createQuery("select u from App:Usuario u where u.nombre = :nombre") -> setParameter('nombre','David');
        $usuariosDql = $query -> getResult();
        foreach ($usuariosDql as $usuarioDql){
            $logger ->info('- > '.$usuarioDql -> getNombre());
        }

        $logger -> info('Single Result: ');
        $usuarioDql = $query -> getSingleResult();
        $logger -> info('- > '.$usuarioDql -> getId().' - '.$usuarioDql -> getNombre().' - '.$usuarioDql -> getTelefono().' - '.$usuarioDql -> getRol() -> getNemonico() );

        return new Response('La respuesta esta en consola ...!');

    }

    /**
     * @Route("/usuario/crear",name="crear_usuario_route")
     */
    public function crear(LoggerInterface $logger, EntityManagerInterface $em){
        $logger -> info('Crear Usuario ...!');
        $logger -> info('Server request : '.$_SERVER['REQUEST_METHOD']);


        $usuario = new \App\Entity\Usuario();
        $usuario -> setNombre('Synfony');
        $usuario -> setTelefono('098765432');

        $em -> persist($usuario);

        $em -> flush();

        return new Response('Saved new product with id '.$usuario -> getId());





        //return $this -> render('usuario/crear.html.twig',[]);
    }

    public function editar($id ,LoggerInterface $logger, EntityManagerInterface $em){
        $logger -> info('Editar Usuario ...!');


        $usuario = $em -> getRepository(\App\Entity\Usuario::class) -> find( $id );

        $usuario -> setNombre($usuario -> getNombre().' mod ...! ');

        $em -> flush();


        return $this -> render('usuario/editar.html.twig',
            [
                'id' => $id,
                'nombre' => $usuario -> getNombre(),
                'telefono' => $usuario -> getTelefono()
            ]
        );
    }

    public function eliminar($id, LoggerInterface $logger, EntityManagerInterface $em){
        $logger -> info('Eliminar Usuario ...!');

        $usuario = $em -> getRepository(\App\Entity\Usuario::class) -> find( $id );
        $em -> remove( $usuario );
        $em -> flush();

        return $this -> render('usuario/eliminar.html.twig',
            [
                'id' => $id,
                'nombre' => $usuario -> getNombre(),
                'telefono' => $usuario -> getTelefono()
            ]
        );
    }

}