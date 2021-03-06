<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Entrega
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EntregaRepository")
 */
class Entrega
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @var \DateTime
     * @ORM\Column(type="time")
     */
    private $horaInicio;

    /**
     * @var \DateTime
     * @ORM\Column(type="time")
     */
    private $horaFin;

    /**
     * @var float
     * @ORM\Column(type="float", precision=2)
     */
    private $peso;

    /**
     * @var float
     * @ORM\Column(type="float", precision=2)
     */
    private $rendimiento;

    /**
     * @var float
     * @ORM\Column(type="float", precision=2, nullable=true)
     */
    private $sancion;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $observaciones;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $bascula;

    /**
     * @var Procedencia
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Procedencia", inversedBy="entregas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $procedencia;

    /**
     * @var Lote
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Lote", inversedBy="entregas")
     * @ORM\JoinColumn(nullable=true)
     */
    private $lote;

    /**
     * @var Finca
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Finca", inversedBy="entregas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $finca;

    /**
     * @var Temporada
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Temporada", inversedBy="entregas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $temporada;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Entrega
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set horaInicio
     *
     * @param \DateTime $horaInicio
     *
     * @return Entrega
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;

        return $this;
    }

    /**
     * Get horaInicio
     *
     * @return \DateTime
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * Set horaFin
     *
     * @param \DateTime $horaFin
     *
     * @return Entrega
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;

        return $this;
    }

    /**
     * Get horaFin
     *
     * @return \DateTime
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * Set peso
     *
     * @param float $peso
     *
     * @return Entrega
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return float
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set rendimiento
     *
     * @param float $rendimiento
     *
     * @return Entrega
     */
    public function setRendimiento($rendimiento)
    {
        $this->rendimiento = $rendimiento;

        return $this;
    }

    /**
     * Get rendimiento
     *
     * @return float
     */
    public function getRendimiento()
    {
        return $this->rendimiento;
    }

    /**
     * Set sancion
     *
     * @param float $sancion
     *
     * @return Entrega
     */
    public function setSancion($sancion)
    {
        $this->sancion = $sancion;

        return $this;
    }

    /**
     * Get sancion
     *
     * @return float
     */
    public function getSancion()
    {
        return $this->sancion;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Entrega
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set bascula
     *
     * @param string $bascula
     *
     * @return Entrega
     */
    public function setBascula($bascula)
    {
        $this->bascula = $bascula;

        return $this;
    }

    /**
     * Get bascula
     *
     * @return string
     */
    public function getBascula()
    {
        return $this->bascula;
    }

    /**
     * Set procedencia
     *
     * @param \AppBundle\Entity\Procedencia $procedencia
     *
     * @return Entrega
     */
    public function setProcedencia(\AppBundle\Entity\Procedencia $procedencia)
    {
        $this->procedencia = $procedencia;

        return $this;
    }

    /**
     * Get procedencia
     *
     * @return \AppBundle\Entity\Procedencia
     */
    public function getProcedencia()
    {
        return $this->procedencia;
    }

    /**
     * Set lote
     *
     * @param \AppBundle\Entity\Lote $lote
     *
     * @return Entrega
     */
    public function setLote(\AppBundle\Entity\Lote $lote = null)
    {
        $this->lote = $lote;

        return $this;
    }

    /**
     * Get lote
     *
     * @return \AppBundle\Entity\Lote
     */
    public function getLote()
    {
        return $this->lote;
    }

    /**
     * Set finca
     *
     * @param \AppBundle\Entity\Finca $finca
     *
     * @return Entrega
     */
    public function setFinca(\AppBundle\Entity\Finca $finca)
    {
        $this->finca = $finca;

        return $this;
    }

    /**
     * Get finca
     *
     * @return \AppBundle\Entity\Finca
     */
    public function getFinca()
    {
        return $this->finca;
    }

    /**
     * Set temporada
     *
     * @param \AppBundle\Entity\Temporada $temporada
     *
     * @return Entrega
     */
    public function setTemporada(\AppBundle\Entity\Temporada $temporada)
    {
        $this->temporada = $temporada;

        return $this;
    }

    /**
     * Get temporada
     *
     * @return \AppBundle\Entity\Temporada
     */
    public function getTemporada()
    {
        return $this->temporada;
    }
}
