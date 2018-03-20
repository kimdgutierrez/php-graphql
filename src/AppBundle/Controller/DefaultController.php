<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
//     /** @var QueryBuilder */
//     protected $query;
    
//     /**
//      * @Route("/", name="homepage")
//      */
//     public function indexAction(Request $request)
//     {
//         return $this->render('default/index.html.twig', [
//             'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
//         ]);
//     }
    
//     /**
//      * @Route("/user_information", name="User Information")
//      */
//     public function userInformationAction(Request $request)
//     {
//         $usr = $this->get('security.token_storage')->getToken()->getUser();
//         $entityManager = $this->get('doctrine.orm.default_entity_manager');
//         $this->query = $entityManager->createQueryBuilder();
        
//         $this->query = $entityManager->createQueryBuilder();
//         $this->query->select('a.Method');
//         $this->query->from('AppBundle:UserAccess', 'a');
//         $this->query->andWhere($this->query->expr()->like('a.Roles', ':Role'));
//         $this->query->setParameters(['Role' => '%'.$usr->getRoles()[0].'%']);
//         $results = $this->query->getQuery()->setMaxResults(300)->getResult();
//         return new JsonResponse(
//             [
//                 'userInfo' => [
//                     'userName' => $usr->getUserName(),
//                     'userRole' => $usr->getRoles()[0]
//                 ],
//                 'accessInfo' => $results,
//             ]
//         );
//     }
}
