<?php

namespace App\Manager;

use App\Entity\Utilisateur;
use App\Entity\Annonce;
use App\Entity\Commentaire;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;

class EmailPostManager
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getUsers(mixed $data)
    {   
        #Get the user who posted the comment
        $userFrom = $this->entityManager->getRepository(Utilisateur::class)->findOneBy(['id' => $data['utilisateur']]);

        #Get the annonce linked to the comment
        $annonce = $this->entityManager->getRepository(Annonce::class)->findOneBy(['id' => $data['annonce']]);

        #From annonce, get all users who posted a comment and put them in an array
        $usersTo = $annonce->getCommentaires()->map(function($commentaire) {
            return $commentaire->getUtilisateur();
        });

        #Get the emails of every unique users who posted a comment
        $usersTo = $usersTo->map(function($user) {
            return $user->getEmail();
        });

        #remove doublons
        $usersTo = array_unique($usersTo->toArray());
        #dd($usersTo);
        $commentaire = new Commentaire();
        $commentaire->setAnnonce($annonce);
        $commentaire->setUtilisateur($userFrom);
        $commentaire->setMessage($data['message']);


        return $commentaire;
    }
}