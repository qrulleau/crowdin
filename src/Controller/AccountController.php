<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="app_account")
     */
    public function index(UserRepository $userRepository, UserInterface $user)
    {
        $userId = $user->getId();

        $users = $userRepository->find($userId);

        return $this->render('account/index.html.twig', [
            'users' => $users
        ]);
    }
}
