<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity
 */
class Annonce
{
    /**
     * @var string
     *
     * @ORM\Column(name="AdresseMailBien", type="string", length=25, nullable=false)
     * @ORM\Id
     */
    private $adressemailbien = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="LineBookBien", type="string", length=255, nullable=true)
     */
    private $linebookbien;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DescriptionAnnonce", type="string", length=255, nullable=true)
     */
    private $descriptionannonce;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="annonce", fetch="EXTRA_LAZY")
     */
    private $message;

    /**
     * @ORM\OneToMany(targetEntity="Disponibilite", mappedBy="annonce", fetch="EXTRA_LAZY")
     * 
     */
    private $disponibilites;

    public function __construct()
    {
        $this->message = new ArrayCollection();
        $this->disponibilites = new ArrayCollection();
    }

    public function getAdressemailbien(): ?string
    {
        return $this->adressemailbien;
    }

    public function setAdressemailbien(?string $adressemailbien):self
    {
         $this->adressemailbien = $adressemailbien;
         return $this;
    }

    public function getLinebookbien(): ?string
    {
        return $this->linebookbien;
    }

    public function setLinebookbien(?string $linebookbien): self
    {
        $this->linebookbien = $linebookbien;

        return $this;
    }

    public function getDescriptionannonce(): ?string
    {
        return $this->descriptionannonce;
    }

    public function setDescriptionannonce(?string $descriptionannonce): self
    {
        $this->descriptionannonce = $descriptionannonce;

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessage(): Collection
    {
        return $this->message;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->message->contains($message)) {
            $this->message[] = $message;
            $message->setAnnonce($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->message->contains($message)) {
            $this->message->removeElement($message);
            // set the owning side to null (unless already changed)
            if ($message->getAnnonce() === $this) {
                $message->setAnnonce(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Disponibilite[]
     */
    public function getDisponibilites(): Collection
    {
        return $this->disponibilites;
    }

    public function addDisponibilite(Disponibilite $disponibilite): self
    {
        if (!$this->disponibilites->contains($disponibilite)) {
            $this->disponibilites[] = $disponibilite;
            $disponibilite->setAnnonce($this);
        }

        return $this;
    }

    public function removeDisponibilite(Disponibilite $disponibilite): self
    {
        if ($this->disponibilites->contains($disponibilite)) {
            $this->disponibilites->removeElement($disponibilite);
            // set the owning side to null (unless already changed)
            if ($disponibilite->getAnnonce() === $this) {
                $disponibilite->setAnnonce(null);
            }
        }

        return $this;
    }

}
