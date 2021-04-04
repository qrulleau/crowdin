<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LanguageRepository::class)
 */
class Language
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string")
     * @ORM\ManyToOne(targetEntity=Project::class)
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
