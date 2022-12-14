<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Animales2
 *
 * @ORM\Table(name="animales2")
 * @ORM\Entity
 */
class Animal2 {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo", type="string", length=255, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=false)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="raza", type="string", length=255, nullable=false)
     */
    private $raza;

    public function getId(): ?int {
        return $this->id;
    }

    public function getTipo(): ?string {
        return $this->tipo;
    }

    public function setTipo(?string $tipo): self {
        $this->tipo = $tipo;

        return $this;
    }

    public function getColor(): ?string {
        return $this->color;
    }

    public function setColor(string $color): self {
        $this->color = $color;

        return $this;
    }

    public function getRaza(): ?string {
        return $this->raza;
    }

    public function setRaza(string $raza): self {
        $this->raza = $raza;

        return $this;
    }

}
