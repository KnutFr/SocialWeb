<?php

namespace ssn\Bundle\ProfilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfilController extends Controller
{
    public function indexAction($id)
    {
      if (false === $this->get('security.context')->isGranted(
        'IS_AUTHENTICATED_FULLY'
                                                              )) {
        throw new AccessDeniedException();
      }
      $user = $this->container->get('security.context')->getToken()->getUser();
      $profil = $this->getDoctrine()->getRepository('ssnSuperAdminBundle:Users')->find($id);

      $em = $this->getDoctrine()->getEntityManager();
      $query = $em->createQuery(
     'SELECT p.content, p.date
      FROM ssnSuperAdminBundle:Publication p
      WHERE p.user = :id
      ORDER BY p.date DESC'
                                )->setParameter('id', $id);
      $query->setMaxResults(5);
      $publications = $query->getResult();
      $query = $em->createQuery(
     'SELECT f
      FROM ssnSuperAdminBundle:Friends f
      WHERE f.user = :id
      ORDER BY f.begin DESC'
                                )->setParameter('id', $id);
      $query->setMaxResults(6);
      $friends = $query->getResult();
      $age = self::age($profil->getBirthday()->getTimestamp());
      $query = $em->createQuery(
     'SELECT a
      FROM ssnSuperAdminBundle:Achieved a
      WHERE a.user = :id
      ORDER BY a.dateof DESC'
                                )->setParameter('id', $id);
      $query->setMaxResults(5);
      $achieveds = $query->getResult();

      $query = $em->createQuery(
     'SELECT al
      FROM ssnSuperAdminBundle:Albums al
      WHERE al.user = :id
      ORDER BY al.date DESC'
                                )->setParameter('id', $id);
      $query->setMaxResults(6);
      $albums = $query->getResult();

      return $this->render('ssnProfilBundle:Profil:index.html.twig', array('id' => $id, 'user' => $user,'profil' => $profil,  'publications' => $publications, 'age' => $age, 'friends' => $friends, 'achieveds' => $achieveds, 'albums' => $albums));
    }
    function age($birthdate)
    {
      return floor((time()-$birthdate)/(60*60*24*365));
    }
}
