<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 6/9/18
 * Time: 4:50 PM
 */
namespace App\Controller;

use Psr\Log\LoggerInterface;
use \Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Home extends AbstractController{

    public function index(LoggerInterface $logger){
        $logger -> info('Ingresa index home ...!');
        return $this -> render('home.html.twig',['name' =>'Alejandro',]);
    }

}