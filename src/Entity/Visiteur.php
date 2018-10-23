<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Visiteur
 *
 * @ORM\Table(name="visiteur")
 * @ORM\Entity
 */
class Visiteur
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdVisiteur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvisiteur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NomVisiteur", type="string", length=12, nullable=true)
     */
    private $nomvisiteur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PrenomVisiteur", type="string", length=12, nullable=true)
     */
    private $prenomvisiteur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="AdresseMail", type="string", length=25, nullable=true)
     */
    private $adressemail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NumTel", type="string", length=12, nullable=true)
     */
    private $numtel;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="visiteur", fetch="EXTRA_LAZY")
     */
    private $messages;

    /**
     * @ORM\OneToMany(targetEntity="Visite", mappedBy="visiteur", fetch="EXTRA_LAZY")
     */
    private $visite;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
        $this->visite = new ArrayCollection();
    }

    public function getIdvisiteur(): ?int
    {
        return $this->idvisiteur;
    }

    public function getNomvisiteur(): ?string
    {
        return $this->nomvisiteur;
    }

    public function setNomvisiteur(?string $nomvisiteur): self
    {
        $this->nomvisiteur = $nomvisiteur;

        return $this;
    }

    public function getPrenomvisiteur(): ?string
    {
        return $this->prenomvisiteur;
    }

    public function setPrenomvisiteur(?string $prenomvisiteur): self
    {
        $this->prenomvisiteur = $prenomvisiteur;

        return $this;
    }

    public function getAdressemail(): ?string
    {
        return $this->adressemail;
    }

    public function setAdressemail(?string $adressemail): self
    {
        $this->adressemail = $adressemail;

        return $this;
    }

    public function getNumtel(): ?string
    {
        return $this->numtel;
    }

    public function setNumtel(?string $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setVisiteur($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->contains($message)) {
            $this->messages->removeElement($message);
            // set the owning side to null (unless already changed)
            if ($message->getVisiteur() === $this) {
                $message->setVisiteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Visite[]
     */
    public function getVisite(): Collection
    {
        return $this->visite;
    }

    public function addVisite(Visite $visite): self
    {
        if (!$this->visite->contains($visite)) {
            $this->visite[] = $visite;
            $visite->setVisiteur($this);
        }

        return $this;
    }

    public function removeVisite(Visite $visite): self
    {
        if ($this->visite->contains($visite)) {
            $this->visite->removeElement($visite);
            // set the owning side to null (unless already changed)
            if ($visite->getVisiteur() === $this) {
                $visite->setVisiteur(null);
            }
        }

        return $this;
    }

}
