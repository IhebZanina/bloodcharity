<?php

namespace App\Entity;

use App\Repository\DonorRepository;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass=DonorRepository::class)
 */
class Donor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=20)
     */
    private $CIN_Passport;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $First_Name;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $Last_Name;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $Country;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $City;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Phone;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Age;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $Job;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $Genre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date_Post;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCINPassport(): ?string
    {
        return $this->CIN_Passport;
    }

    public function setCINPassport(string $CIN_Passport): self
    {
        $this->CIN_Passport = $CIN_Passport;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->First_Name;
    }

    public function setFirstName(string $First_Name): self
    {
        $this->First_Name = $First_Name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->Last_Name;
    }

    public function setLastName(string $Last_Name): self
    {
        $this->Last_Name = $Last_Name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

     public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;
        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->Phone;
    }

    public function setPhone(int $Phone): self
    {
        $this->Phone = $Phone;

        return $this;
    }

    public function getAge(): ?\DateTimeInterface
    {
        return $this->Age;
    }

    public function setAge(\DateTimeInterface $Age): self
    {
        $this->Age = $Age;

        return $this;
    }

      public function getJob(): ?string
    {
        return $this->Job;
    }

    public function setJob(string $Job): self
    {
        $this->Job = $Job;

        return $this;
    }


    public function getGenre(): ?string
    {
        return $this->Genre;
    }

    public function setGenre(string $Genre): self
    {
        $this->Genre = $Genre;

        return $this;
    }

    public function getDatePost(): ?\DateTimeInterface
    {
        return $this->Date_Post;
    }

    public function setDatePost(\DateTimeInterface $Date_Post): self
    {
        $this->Date_Post = $Date_Post;

        return $this;
    }
}
