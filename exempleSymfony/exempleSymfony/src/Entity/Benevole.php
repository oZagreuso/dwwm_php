<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BenevoleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BenevoleRepository::class)]
#[ApiResource]
class Benevole
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120, nullable: false)]
    private ?string $nom = null;

    #[ORM\Column(length: 120, nullable: false)]
    private ?string $prenom = null;

    #[ORM\Column(length: 15, nullable: false)]
    private ?string $num_tel = null;

    #[ORM\Column(length: 120, nullable: true)]
    private ?string $poste = null;

    #[ORM\Column(length: 150, nullable: false)]
    private ?string $mail = null;

    #[ORM\Column(length: 400, nullable: true)]
    private ?string $pass = null;

    #[ORM\Column(nullable: false)]
    private ?int $level = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->num_tel;
    }

    public function setNumTel(?string $num_tel): static
    {
        $this->num_tel = $num_tel;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(?string $poste): static
    {
        $this->poste = $poste;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPass(): ?string
    {
        return $this->pass;
    }

    public function setPass(?string $pass): static
    {
        $this->pass = $pass;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): static
    {
        $this->level = $level;

        return $this;
    }
}
