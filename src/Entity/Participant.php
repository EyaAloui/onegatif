<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipantRepository::class)]
class Participant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'participant', targetEntity: Infermier::class)]
    private Collection $Infermier;

    #[ORM\OneToMany(mappedBy: 'participant', targetEntity: Donneur::class)]
    private Collection $Donneur;

    #[ORM\OneToMany(mappedBy: 'participant', targetEntity: Responsable::class)]
    private Collection $Responsable;

    public function __construct()
    {
        $this->Infermier = new ArrayCollection();
        $this->Donneur = new ArrayCollection();
        $this->Responsable = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Infermier>
     */
    public function getInfermier(): Collection
    {
        return $this->Infermier;
    }

    public function addInfermier(Infermier $infermier): self
    {
        if (!$this->Infermier->contains($infermier)) {
            $this->Infermier->add($infermier);
            $infermier->setParticipant($this);
        }

        return $this;
    }

    public function removeInfermier(Infermier $infermier): self
    {
        if ($this->Infermier->removeElement($infermier)) {
            // set the owning side to null (unless already changed)
            if ($infermier->getParticipant() === $this) {
                $infermier->setParticipant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Donneur>
     */
    public function getDonneur(): Collection
    {
        return $this->Donneur;
    }

    public function addDonneur(Donneur $donneur): self
    {
        if (!$this->Donneur->contains($donneur)) {
            $this->Donneur->add($donneur);
            $donneur->setParticipant($this);
        }

        return $this;
    }

    public function removeDonneur(Donneur $donneur): self
    {
        if ($this->Donneur->removeElement($donneur)) {
            // set the owning side to null (unless already changed)
            if ($donneur->getParticipant() === $this) {
                $donneur->setParticipant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Responsable>
     */
    public function getResponsable(): Collection
    {
        return $this->Responsable;
    }

    public function addResponsable(Responsable $responsable): self
    {
        if (!$this->Responsable->contains($responsable)) {
            $this->Responsable->add($responsable);
            $responsable->setParticipant($this);
        }

        return $this;
    }

    public function removeResponsable(Responsable $responsable): self
    {
        if ($this->Responsable->removeElement($responsable)) {
            // set the owning side to null (unless already changed)
            if ($responsable->getParticipant() === $this) {
                $responsable->setParticipant(null);
            }
        }

        return $this;
    }
}
