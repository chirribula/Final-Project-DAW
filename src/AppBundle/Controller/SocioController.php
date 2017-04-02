<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SocioController extends Controller
{
    /**
     * @Route("/socios/listar", name="socios_listar")
     */
    public function indexAction()
    {
        /** @var EntityManager $em */
        $em=$this->getDoctrine()->getManager();

        $socios = $em->createQueryBuilder()
            ->select('s')
            ->from('AppBundle:Socio', 's')
            ->getQuery()
            ->getResult();
/*
        $numPlantas = $em->createQueryBuilder()
            ->select('sum(f.numPlantas')
            ->from('AppBundle:Finca', 'f')
            ->groupBy('f.propietario')
            ->getQuery()
            ->getResult();
*/
        return $this->render('socio/listar.html.twig', [
            'socios' => $socios,
        ]);
    }
}