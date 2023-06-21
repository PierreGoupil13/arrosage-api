<?php

namespace App\Manager;

use App\Entity\Utilisateur;
use App\Entity\Annonce;
use App\Entity\Commentaire;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailPostManager
{
    private EntityManagerInterface $entityManager;
    private MailerInterface $mailer;
    public function __construct(EntityManagerInterface $entityManager, MailerInterface $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    public function getUsers(mixed $data)
    {   
        #Get the user who posted the comment
        $userFrom = $this->entityManager->getRepository(Utilisateur::class)->findOneBy(['id' => $data['utilisateur']]);

        #Create the email from the user who posted the comment to the user who posted the annonce
        $email = (new Email())
            ->from($userFrom->getEmail())
            ->to('p.goupil356@gmail.com')
            ->subject('Nouveau commentaire sur votre annonce')
            ->text('Vous avez reçu un nouveau commentaire sur votre annonce')
            ->html('<p>Vous avez reçu un nouveau commentaire sur votre annonce</p>');

        


        #Get the annonce linked to the comment
        $annonce = $this->entityManager->getRepository(Annonce::class)->findOneBy(['id' => $data['annonce']]);
        #send the email
        $this->mailer->send($email);
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

        #send a mail to every users who posted a comment
        foreach($usersTo as $userTo) {
            $email = (new Email())
                ->from($userFrom->getEmail())
                ->to($userTo)
                ->subject('Nouveau commentaire sur une annonce que vous avez commenté')
                ->text('Vous avez reçu un nouveau commentaire sur une annonce que vous avez commenté')
                ->html('<p>Vous avez reçu un nouveau commentaire sur une annonce que vous avez commenté</p>');
            $this->mailer->send($email);
        }
        #dd($usersTo);
        $commentaire = new Commentaire();
        $commentaire->setAnnonce($annonce);
        $commentaire->setUtilisateur($userFrom);
        $commentaire->setMessage($data['message']);


        return $commentaire;
    }
}