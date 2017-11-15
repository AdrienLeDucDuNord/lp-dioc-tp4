<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @Route(path = "/my_profile", name = "app_user_myprofile")
     * @return Response
     */
    public function myProfileAction()
    {
        return $this->render('User/my_profile.html.twig');
    }

    /**
     * // FIXME: la route doit être /profile/3 par exemple.
     * @Route(path = "/profile/:id", name = "app_user_profile")
     */
    public function profileAction(User $user)
    {
        // FIXME: un utilisateur connecté qui se rend sur sa propre page est redirigé vers /my_profile
        if( $user === $this->getUser()){
            return $this->redirect($this->generateUrl('app_user_myprofile'));
        }
        return $this->render('User/profile.html.twig', ['user' => $user]);
    }
}
