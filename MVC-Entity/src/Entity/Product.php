<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $cena;

    /**
     * @ORM\Column(type="text")
     */
    private $opis;

    /**
     * @ORM\Column(type="date")
     */
    private $data;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $podatek;

    /**
     * @ORM\Column(type="array")
     */
    private $kategorie = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $dostep;

    /**
     * @ORM\Column(type="integer")
     */
    private $ilosc;

    /**
     * @ORM\Column(type="bigint")
     */
    private $kod;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCena(): ?float
    {
        return $this->cena;
    }

    public function setCena(float $cena): self
    {
        $this->cena = $cena;

        return $this;
    }

    public function getOpis(): ?string
    {
        return $this->opis;
    }

    public function setOpis(string $opis): self
    {
        $this->opis = $opis;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getPodatek(): ?string
    {
        return $this->podatek;
    }

    public function setPodatek(string $podatek): self
    {
        $this->podatek = $podatek;

        return $this;
    }

    public function getKategorie(): ?array
    {
        return $this->kategorie;
    }

    public function setKategorie(array $kategorie): self
    {
        $this->kategorie = $kategorie;

        return $this;
    }

    public function getDostep(): ?bool
    {
        return $this->dostep;
    }

    public function setDostep(bool $dostep): self
    {
        $this->dostep = $dostep;

        return $this;
    }

    public function getIlosc(): ?int
    {
        return $this->ilosc;
    }

    public function setIlosc(int $ilosc): self
    {
        $this->ilosc = $ilosc;

        return $this;
    }

    public function getKod(): ?string
    {
        return $this->kod;
    }

    public function setKod(string $kod): self
    {
        $this->kod = $kod;

        return $this;
    }

    public function __construct(string $name = "", float $cena = 1){
        $this->setName($name);
        $this->setCena($cena);
        $this->setOpis('Przykładowy opis!');
        $currentDate = new DateTime();
        $currentDate->setDate($this->convertDate(date("Y")), $this->convertDate(date("m")), $this->convertDate(date("d")));
        $this->setData($currentDate);
        $this->setDostep(true);
        $this->setIlosc(10);
        $this->setKod(1234567890);
        $this->setKategorie(["kat1", "kat2", "kat3"]);
        $this->setPodatek(00.07);
    }
    private function convertDate(string $value)
    {
        $current = 0;
        $length = strlen($value);
        for($i = 0; $i < $length; $i++)
        {
            $current += $this->toNumber($value[$i]) * pow(10, $length - $i);
        }
        return $current;
    }
    private function toNumber($dest)
    {
        if ($dest)
            return ord(strtolower($dest)) - '0';
        else
            return 0;
    }

}
