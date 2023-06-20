<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
#[ApiResource]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?int $numero = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rue = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codePostal = null;

    #[ORM\ManyToMany(targetEntity: Plante::class, inversedBy: 'annonces')]
    private Collection $plantes;

    #[ORM\ManyToOne(inversedBy: 'annoncesProp')]
    private ?Utilisateur $utilisateurProp = null;

    #[ORM\ManyToMany(targetEntity: Utilisateur::class, inversedBy: 'annoncesPart')]
    private Collection $utilisateursPart;

    #[ORM\OneToMany(mappedBy: 'annonce', targetEntity: Commentaire::class)]
    private Collection $commentaires;

    public function __construct()
    {
        $this->plantes = new ArrayCollection();
        $this->utilisateursPart = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(?int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(?string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * @return Collection<int, Plante>
     */
    public function getPlantes(): Collection
    {
        return $this->plantes;
    }

    public function addPlante(Plante $plante): self
    {
        if (!$this->plantes->contains($plante)) {
            $this->plantes->add($plante);
        }

        return $this;
    }

    public function removePlante(Plante $plante): self
    {
        $this->plantes->removeElement($plante);

        return $this;
    }

    public function getUtilisateurProp(): ?Utilisateur
    {
        return $this->utilisateurProp;
    }

    public function setUtilisateurProp(?Utilisateur $utilisateurProp): self
    {
        $this->utilisateurProp = $utilisateurProp;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateursPart(): Collection
    {
        return $this->utilisateursPart;
    }

    public function addUtilisateursPart(Utilisateur $utilisateursPart): self
    {
        if (!$this->utilisateursPart->contains($utilisateursPart)) {
            $this->utilisateursPart->add($utilisateursPart);
        }

        return $this;
    }

    public function removeUtilisateursPart(Utilisateur $utilisateursPart): self
    {
        $this->utilisateursPart->removeElement($utilisateursPart);

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
            $commentaire->setAnnonce($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getAnnonce() === $this) {
                $commentaire->setAnnonce(null);
            }
        }

        return $this;
    }
}
