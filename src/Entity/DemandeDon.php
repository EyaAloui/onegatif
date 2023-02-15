<?php

namespace App\Entity;

use App\Repository\DemandeDonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeDonRepository::class)]
class DemandeDon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $groupesanguin = null;

    #[ORM\Column(length: 100)]
    private ?string $region = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupesanguin(): ?string
    {
        return $this->groupesanguin;
    }

    public function setGroupesanguin(string $groupesanguin): self
    {
        $this->groupesanguin = $groupesanguin;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }
}
