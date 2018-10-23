<?php 
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message 
 * 
 * @ORM\Entity
 * @ORM\Table(name="message")
 */

 class Message{
                               
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    private $idMsg;

    /** 
    * @ORM\Column(type="datetime")
    */
    private $msgTime;

    /**
    * @ORM\Column(type="string")
    */
    private $msqContent; 

    /**
    * @ORM\ManyToOne(targetEntity="Visiteur", inversedBy="messages")
    * @ORM\JoinColumn(name="visiteur_id", referencedColumnName="IdVisiteur")
    */
    private $visiteur;

    /**
    * @ORM\ManyToOne(targetEntity="Annonce", inversedBy="message")
    * @ORM\JoinColumn(name="annonce_id", referencedColumnName="adressemailbien")
    */
    private $annonce;

    public function getIdMsg(): ?int
    {
        return $this->idMsg;
    }

    public function getMsgTime(): ?\DateTimeInterface
    {
        return $this->msgTime;
    }

    public function setMsgTime(\DateTimeInterface $msgTime): self
    {
        $this->msgTime = $msgTime;

        return $this;
    }

    public function getMsqContent(): ?string
    {
        return $this->msqContent;
    }

    public function setMsqContent(string $msqContent): self
    {
        $this->msqContent = $msqContent;

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