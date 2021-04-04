<?php

namespace Parallalax\SynchroBundle\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/synchro", name="synchro_")
 *
 */
class SynchroController extends AbstractController{

    /**
     * @Route("/users", name="users")
     *
     * @param Request $request
     * @return JsonResponse
     */
    function listUsers(Request $request) {

        $usersToSync = array();
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(User::class)->findAll();

        foreach($users as $u) {
            if(!empty($u->getAuthToken())) {
                $usersToSync[] = ['uid' => $u->getUId(), 'auth_token' => $u->getAuthToken(), 'email' => $u->getEmail(), 'roles' => $u->getRoles(), 'active' => true];
            }
        }

        $response = new JsonResponse();
        $response->setData($usersToSync);

        return $response;
    }
}