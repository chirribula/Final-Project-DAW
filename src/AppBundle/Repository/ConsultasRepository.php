<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Entrega;
use AppBundle\Entity\Socio;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ConsultasRepository extends EntityRepository
{
    public function getProcedencias()
    {
        /** @var EntityManager $em */
        $em = $this->getEntityManager();

        $consulta = $em->createQueryBuilder()
            ->select('p')
            ->from('AppBundle:Procedencia', 'p')
            ->getQuery()
            ->getResult();

        return $consulta;
    }

    public function getSocios()
    {
        /** @var EntityManager $em */
        $em = $this->getEntityManager();

        $consulta = $em->createQueryBuilder()
            ->select('s')
            ->from('AppBundle:Socio', 's')
            ->getQuery()
            ->getResult();

        return $consulta;
    }

    public function getFincas()
    {
        /** @var EntityManager $em */
        $em = $this->getEntityManager();

        $consulta = $em->createQueryBuilder()
            ->select('f')
            ->from('AppBundle:Finca', 'f')
            ->getQuery()
            ->getResult();

        return $consulta;
    }

    public function getFincasPorLote(Lote $lote)
    {
        /** @var EntityManager $em */
        $em = $this->getEntityManager();

        $consulta = $em->createQueryBuilder()
            ->select('f')
            ->addSelect('e')
            ->addSelect('a')
            ->addSelect('d')
            ->addSelect('l')
            ->from('AppBundle:Finca', 'f')
            ->join('f.entregas', 'e')
            ->join('e.partida', 'a')
            ->join('a.deposito', 'd')
            ->join('d.lotes', 'l')
            ->where('l = :lot')
            ->setParameter('lot', $lote)
            ->getQuery()
            ->getResult();

        return $consulta;
    }

    public function getFincasPorPropietario(Socio $socio)
    {
        /** @var EntityManager $em */
        $em = $this->getEntityManager();

        $consulta = $em->createQueryBuilder()
            ->select('f')
            ->addSelect('p')
            ->from('AppBundle:Finca', 'f')
            ->join('f.propietario', 'p')
            ->where('p = :propietario')
            ->setParameter('propietario', $socio)
            ->getQuery()
            ->getResult();

        return $consulta;
    }

    public function getFincasPorArrendatario(Socio $socio)
    {
        /** @var EntityManager $em */
        $em = $this->getEntityManager();

        $consulta = $em->createQueryBuilder()
            ->select('f')
            ->addSelect('a')
            ->from('AppBundle:Finca', 'f')
            ->join('f.arrendatario', 'a')
            ->where('a = :arrendatario')
            ->setParameter('arrendatario', $socio)
            ->getQuery()
            ->getResult();

        return $consulta;
    }

    public function getPartidas()
    {
        /** @var EntityManager $em */
        $em = $this->getEntityManager();

        $consulta = $em->createQueryBuilder()
            ->select('p')
            ->from('AppBundle:Partida', 'p')
            ->getQuery()
            ->getResult();

        return $consulta;
    }

    public function getEntregas()
    {
        /** @var EntityManager $em */
        $em = $this->getEntityManager();

        $consulta = $em->createQueryBuilder()
            ->select('e')
            ->from('AppBundle:Entrega', 'e')
            ->getQuery()
            ->getResult();

        return $consulta;
    }

    public function getEntregasSocio(Socio $socio)
    {
        /** @var EntityManager $em */
        $em = $this->getEntityManager();

        $consulta = $em->createQueryBuilder()
            ->select('e')
            ->addSelect('f')
            ->addSelect('p')
            ->from('AppBundle:Entrega', 'e')
            ->join('e.finca', 'f')
            ->join('f.propietario', 'p')
            ->join('f.arrendatario', 'a')
            ->where('p = :socio')
            ->orwhere('a = :socio')
            ->setParameter('socio', $socio)
            ->getQuery()
            ->getResult();

        return $consulta;
    }

    public function getEntregasDetalle(Entrega $entrega, Socio $socio)
    {
        /** @var EntityManager $em */
        $em = $this->getEntityManager();

        $consulta = $em->createQueryBuilder()
            ->select('e')
            ->addSelect('f')
            ->addSelect('p')
            ->from('AppBundle:Entrega', 'e')
            ->join('e.finca', 'f')
            ->join('f.propietario', 'p')
            ->join('f.arrendatario', 'a')
            ->where('e.id = :ent')
            ->andwhere('p = :socio')
            ->orwhere('a = :socio')
            ->setParameter('ent', $entrega)
            ->setParameter('socio', $socio)
            ->getQuery()
            ->getResult();

        return $consulta;
    }
}