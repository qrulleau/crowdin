<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=User::class)
     */
    private $user_id;

    /**
     * @ORM\OneToMany(targetEntity=Language::class, mappedBy="id")
     */
    private $lang_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $language;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
        $this->lang_code = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(User $userId): self
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id[] = $userId;
        }

        return $this;
    }

    public function removeUserId(User $userId): self
    {
        $this->user_id->removeElement($userId);

        return $this;
    }

    /**
     * @return Collection|Language[]
     */
    public function getLangCode(): Collection
    {
        return $this->lang_code;
    }

    public function addLangCode(Language $langCode): self
    {
        if (!$this->lang_code->contains($langCode)) {
            $this->lang_code[] = $langCode;
            $langCode->setCodeProject($this);
        }

        return $this;
    }

    public function removeLangCode(Language $langCode): self
    {
        if ($this->lang_code->removeElement($langCode)) {
            // set the owning side to null (unless already changed)
            if ($langCode->getCodeProject() === $this) {
                $langCode->setCodeProject(null);
            }
        }

        return $this;
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
}
