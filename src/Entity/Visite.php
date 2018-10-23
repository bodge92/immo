<?php 

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visite 
 * 
 * @ORM\Table(name="visite")
 * @ORM\Entity
 * 
 */


 class Visite{
                           
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    private $idVis;

    /**
    * @ORM\Column(type="datetime")
    */
    private $dateVisStart;

    /**
    * @ORM\Column(type="datetime")
    */
    private $dateVisEnd;


    /**
    * @ORM\ManyToOne(targetEntity="Annonce",  inversedBy="visite")
    * @ORM\JoinColumn(name="annonce_id", referencedColumnName="AdresseMailBien")
    */
    private $annonce;

    /**
    * 
    * @ORM\ManyToOne(targetEntity="Visiteur", inversedBy="visite")
    *  @ORM\JoinColumn(name="visiteur_id" ,referencedColumnName="IdVisiteur")
    */
    private $visiteur;

    public function getIdVis(): ?int
    {
        return $this->idVis;
    }

    public function getDateVisStart(): ?\DateTimeInterface
    {
        return $this->dateVisStart;
    }

    public function setDateVisStart(\DateTimeInterface $dateVisStart): self
    {
        $this->dateVisStart = $dateVisStart;

        return $this;
    }

    public function getDateVisEnd(): ?\DateTimeInterface
    {
        return $this->dateVisEnd;
    }

    public function setDateVisEnd(\DateTimeInterface $dateVisEnd): self
    {
        $this->dateVisEnd = $dateVisEnd;

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

    public function getVisiteur(): ?Visiteur
    {
        return $this->visiteur;
    }

    public function setVisiteur(?Visiteur $visiteur): self
    {
        $this->visiteur = $visiteur;

        return $this;
    }

}
?>