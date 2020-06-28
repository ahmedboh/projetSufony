<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 * @UniqueEntity(
 *     fields={"idCli", "idService"},
 *     errorPath="idService",
 *     message="ce client a chosis ce service  "
 * )
 */
class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateR;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCli;

    /**
     * @ORM\ManyToOne(targetEntity=Service::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idService;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateR(): ?\DateTimeInterface
    {
        return $this->dateR;
    }

    public function setDateR(\DateTimeInterface $dateR): self
    {
        $this->dateR = $dateR;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getIdCli(): ?Client
    {
        return $this->idCli;
    }

    public function setIdCli(?Client $idCli): self
    {
        $this->idCli = $idCli;

        return $this;
    }

    public function getIdService(): ?Service
    {
        return $this->idService;
    }

    public function setIdService(?Service $idService): self
    {
        $this->idService = $idService;

        return $this;
    }
}
