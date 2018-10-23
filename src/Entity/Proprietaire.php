<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Proprietaire
 *
 * @ORM\Table(name="proprietaire", indexes={@ORM\Index(name="IdAgentImmo", columns={"IdAgentImmo"})})
 * @ORM\Entity
 */
class Proprietaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdProprietaire", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproprietaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NomProp", type="string", length=12, nullable=true)
     */
    private $nomprop;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PrenomProp", type="string", length=12, nullable=true)
     */
    private $prenomprop;

    /**
     * @var string|null
     *
     * @ORM\Column(name="AdresseMail", type="string", length=25, nullable=true)
     */
    private $adressemail;

    /**
     * @var \Agentimmo
     *
     * @ORM\ManyToOne(targetEntity="Agentimmo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdAgentImmo", referencedColumnName="IdAgentImmo")
     * })
     */
    private $idagentimmo;

    /**
     * @ORM\OneToMany(targetEntity="Disponibilite", mappedBy="proprietaire", fetch="EXTRA_LAZY")
     */
    private $disponibilites;

    public function __construct()
    {
        $this->disponibilites = new ArrayCollection();
    }

    public function getIdproprietaire(): ?int
    {
        return $this->idproprietaire;
    }

    public function getNomprop(): ?string
    {
        return $this->nomprop;
    }

    public function setNomprop(?string $nomprop): self
    {
        $this->nomprop = $nomprop;

        return $this;
    }

    public function getPrenomprop(): ?string
    {
        return $this->prenomprop;
    }

    public function setPrenomprop(?string $prenomprop): self
    {
        $this->prenomprop = $prenomprop;

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

    public function getIdagentimmo(): ?Agentimmo
    {
        return $this->idagentimmo;
    }

    public function setIdagentimmo(?Agentimmo $idagentimmo): self
    {
        $this->idagentimmo = $idagentimmo;

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
            $disponibilite->setProprietaire($this);
        }

        return $this;
    }

    public function removeDisponibilite(Disponibilite $disponibilite): self
    {
        if ($this->disponibilites->contains($disponibilite)) {
            $this->disponibilites->removeElement($disponibilite);
            // set the owning side to null (unless already changed)
            if ($disponibilite->getProprietaire() === $this) {
                $disponibilite->setProprietaire(null);
            }
        }

        return $this;
    }

}
