<?php

namespace App\Entity;

use App\Repository\StocksangRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StocksangRepository::class)]
class Stocksang
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numero_stock = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $stock_desc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroStock(): ?int
    {
        return $this->numero_stock;
    }

    public function setNumeroStock(int $numero_stock): self
    {
        $this->numero_stock = $numero_stock;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStockDesc(): ?string
    {
        return $this->stock_desc;
    }

    public function setStockDesc(string $stock_desc): self
    {
        $this->stock_desc = $stock_desc;

        return $this;
    }
}
