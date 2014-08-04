<?php

namespace ssn\Bundle\AchievementsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AchievementsController extends Controller
{
    public function indexAction()
    {
      $user = $this->container->get('security.context')->getToken()->getUser();
      $userid = $user->getId();
      $em = $this->getDoctrine()->getEntityManager();
      $query = $em->createQuery(
     'SELECT a
      FROM ssnSuperAdminBundle:Achieved a
      WHERE a.user = :id
      ORDER BY a.dateof DESC'
                                )->setParameter('id', $userid);
      $query->setMaxResults(3);
      $rachieveds = $query->getResult();
      $achieveds = $user->getAchieveds();

      $query = $em->createQuery(
          'SELECT a
      FROM ssnSuperAdminBundle:Achievements a
      WHERE a NOT IN
       (SELECT IDENTITY(ac.achievement) FROM ssnSuperAdminBundle:Achieved ac  WHERE ac.user = :id)'
                                )->setParameter('id', $userid);
      $nachieved = $query->getResult();
      return $this->render('ssnAchievementsBundle:Achievements:index.html.twig', array('user' => $user, 'rachieveds' => $rachieveds , 'achieveds' => $achieveds, 'nachieved' => $nachieved));
    }
}
