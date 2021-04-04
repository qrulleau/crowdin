<?php

namespace App\Entity;

use App\Repository\UserLanguageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserLanguageRepository::class)
 */
class UserLanguage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @ORM\ManyToMany(targetEntity=Language::class)
     */
    private $lang_code;

    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToMany(targetEntity=User::class)
     */
    private $user_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLangCode(): ?string
    {
        return $this->lang_code;
    }

    public function setLangCode(string $lang_code): self
    {
        $this->lang_code = $lang_code;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
}
