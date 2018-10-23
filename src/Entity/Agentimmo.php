<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agentimmo
 *
 * @ORM\Table(name="agentimmo")
 * @ORM\Entity
 */
class Agentimmo
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdAgentImmo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idagentimmo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NomAgent", type="string", length=12, nullable=true)
     */
    private $nomagent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PrenomAgent", type="string", length=12, nullable=true)
     */
    private $prenomagent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="AdresseMail", type="string", length=25, nullable=true)
     */
    private $adressemail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NumTelAgent", type="string", length=12, nullable=true)
     */
    private $numtelagent;

    public function getIdagentimmo(): ?int
    {
        return $this->idagentimmo;
    }

    public function getNomagent(): ?string
    {
        return $this->nomagent;
    }

    public function setNomagent(?string $nomagent): self
    {
        $this->nomagent = $nomagent;

        return $this;
    }

    public function getPrenomagent(): ?string
    {
        return $this->prenomagent;
    }

    public function setPrenomagent(?string $prenomagent): self
    {
        $this->prenomagent = $prenomagent;

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

    public function getNumtelagent(): ?string
    {
        return $this->numtelagent;
    }

    public function setNumtelagent(?string $numtelagent): self
    {
        $this->numtelagent = $numtelagent;

        return $this;
    }


}
