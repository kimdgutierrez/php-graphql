<?php

namespace PandoraBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    
    /**
     * @Route("/user_information", name="User Information")
     */
    public function userInformationAction(Request $request)
    {
        $usr = $this->get('security.token_storage')->getToken()->getUser();
        $entityManager = $this->get('doctrine.orm.default_entity_manager');
        
        $this->query = $entityManager->createQueryBuilder();
        $this->query->select('a.Method');
        $this->query->from('AppBundle:UserAccess', 'a');
        $this->query->andWhere($this->query->expr()->like('a.Roles', ':Role'));
        $this->query->setParameters(['Role' => '%'.$usr->getRoles()[0].'%']);
        $results = $this->query->getQuery()->setMaxResults(300)->getResult();
        return new JsonResponse(
            [
                'userInfo' => [
                    'userName' => $usr->getUserName(),
                    'userRole' => $usr->getRoles()[0],
                    'userId' => $usr->getAspNetUserId(),
                    'brandMarket' => $usr->getBrandMarkets()
                ],
                'wsPort' => $this->container->getParameter('webscoket_port'),
                'accessInfo' => $results,
            ]
        );
    }
    
//     /**
//      * @Route("/login", name="login")
//      */
//     public function loginAction(Request $request)
//     {
//         $authenticationUtils = $this->get('security.authentication_utils');
        
//         // get the login error if there is one
//         $error = $authenticationUtils->getLastAuthenticationError();
        
//         // last username entered by the user
//         $lastUsername = $authenticationUtils->getLastUsername();
        
//         return $this->render(
//             'AppBundle::security/login.html.twig',
//             array(
//                 // last username entered by the user
//                 'last_username' => $lastUsername,
//                 'error'         => $error
//             )
//         );
//     }
    
//     /**
//      * @Route("/login_check", name="login_check")
//      */
//     public function loginCheckAction()
//     {
//         // this controller will not be executed,
//         // as the route is handled by the Security system
//         throw new \Exception('Which means that this Exception will not be raised anytime soon …');
//     }
}
