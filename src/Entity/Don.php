<?php

namespace App\Entity;

use App\Repository\DonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonRepository::class)]
class Don
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $groupesanguin = null;

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
}
