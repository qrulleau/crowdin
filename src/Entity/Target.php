<?php

namespace App\Entity;

use App\Repository\TargetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TargetRepository::class)
 */
class Target
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @ORM\OneToMany(targetEntity=Language::class, mappedBy="id")
     */
    private $language;

    /**
     * @ORM\Column(type="integer")
     * @ORM\OneToOne(targetEntity=Source::class, mappedBy="id")
     */
    private $source_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getSourceId(): ?int
    {
        return $this->source_id;
    }

    public function setSourceId(int $source_id): self
    {
        $this->source_id = $source_id;

        return $this;
    }
}
