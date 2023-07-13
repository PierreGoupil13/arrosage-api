<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Controller\UserFromPseudo;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new Post(),
        new GetCollection(),
        new GetCollection(
            uriTemplate: '/utilisateurs_from_pseudo',
            controller:UserFromPseudo::class,
            denormalizationContext: ['groups' => ['read:UserFromPseudo']]
        )
    ]
)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mdp = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $role = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['read:UserFromPseudo'])]
    private ?string $pseudo = null;

    #[ORM\OneToMany(mappedBy: 'utilisateurProp', targetEntity: Annonce::class)]
    private Collection $annoncesProp;

    #[ORM\ManyToMany(targetEntity: Annonce::class, mappedBy: 'utilisateursPart')]
    private Collection $annoncesPart;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Commentaire::class)]
    private Collection $commentaires;

    public function __construct()
    {
        $this->annoncesProp = new ArrayCollection();
        $this->annoncesPart = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(?string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * @return Collection<int, Annonce>
     */
    public function getAnnoncesProp(): Collection
    {
        return $this->annoncesProp;
    }

    public function addAnnoncesProp(Annonce $annoncesProp): self
    {
        if (!$this->annoncesProp->contains($annoncesProp)) {
            $this->annoncesProp->add($annoncesProp);
            $annoncesProp->setUtilisateurProp($this);
        }

        return $this;
    }

    public function removeAnnoncesProp(Annonce $annoncesProp): self
    {
        if ($this->annoncesProp->removeElement($annoncesProp)) {
            // set the owning side to null (unless already changed)
            if ($annoncesProp->getUtilisateurProp() === $this) {
                $annoncesProp->setUtilisateurProp(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Annonce>
     */
    public function getAnnoncesPart(): Collection
    {
        return $this->annoncesPart;
    }

    public function addAnnoncesPart(Annonce $annoncesPart): self
    {
        if (!$this->annoncesPart->contains($annoncesPart)) {
            $this->annoncesPart->add($annoncesPart);
            $annoncesPart->addUtilisateursPart($this);
        }

        return $this;
    }

    public function removeAnnoncesPart(Annonce $annoncesPart): self
    {
        if ($this->annoncesPart->removeElement($annoncesPart)) {
            $annoncesPart->removeUtilisateursPart($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setUtilisateur($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getUtilisateur() === $this) {
                $commentaire->setUtilisateur(null);
            }
        }

        return $this;
    }
}
