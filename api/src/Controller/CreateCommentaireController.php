<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Manager\EmailPostManager;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class CreateCommentaireController
{
    public function __invoke(Request $request, EmailPostManager $emailPostManager)
    {
        
        $annonce = json_decode(($request->getContent()))->annonce;
        $annonce = intval(explode('annonces/', $annonce)[1]);

        $user = json_decode(($request->getContent()))->utilisateur;
        $user = intval(explode('utilisateurs/', $user)[1]);

        $data = [
            'annonce' => $annonce,
            'utilisateur' => $user,
            'message' => json_decode(($request->getContent()))->message
        ];

        #dd($data);
        $test = $emailPostManager->getUsers($data);

        return $test;
    }
}