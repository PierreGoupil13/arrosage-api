<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class UserFromPseudo
{
    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * 
     * @return int
     */
    public function __invoke(Request $request, EntityManagerInterface $entityManager)
    {   
        $pseudo = $request->query->get('pseudo');
        #Get the user from the pseudo
        $user = $entityManager->getRepository(Utilisateur::class)->findOneBy(['pseudo' => $pseudo]);
        #Return the id of the user
        return $user->getId();
    }
}