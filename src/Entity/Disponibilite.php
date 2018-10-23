<?php 

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disponibilite 
 * 
 * @ORM\Table(name="disponibilite")
 * @ORM\Entity
 */

class Disponibilite{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $idDisp;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDispoStart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDispoEnd;

    /**
     * @ORM\ManyToOne(targetEntity="Proprietaire", inversedBy="disponibilites")
     * @ORM\JoinColumn(name="prop_id",  referencedColumnName="IdProprietaire")
     */
    private $proprietaire;

    /**
     * @ORM\ManyToOne(targetEntity="Annonce", inversedBy="disponibilites")
     * @ORM\JoinColumn(name="annonce_id",  referencedColumnName="AdresseMailBien")
     */
    private $annonce;

    public function getIdDisp(): ?int
    {
        return $this->idDisp;
    }

    public function getDateDispoStart(): ?\DateTimeInterface
    {
        return $this->dateDispoStart;
    }

    public function setDateDispoStart(\DateTimeInterface $dateDispoStart): self
    {
        $this->dateDispoStart = $dateDispoStart;

        return $this;
    }

    public function getDateDispoEnd(): ?\DateTimeInterface
    {
        return $this->dateDispoEnd;
    }

    public function setDateDispoEnd(\DateTimeInterface $dateDispoEnd): self
    {
        $this->dateDispoEnd = $dateDispoEnd;

        return $this;
    }

    public function getProprietaire(): ?Proprietaire
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?Proprietaire $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }

}
?>