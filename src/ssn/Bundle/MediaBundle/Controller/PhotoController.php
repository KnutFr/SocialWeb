<?php

namespace ssn\Bundle\MediaBundle\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ssn\Bundle\SuperAdminBundle\Entity\Photos;
use \DateTime;

class PhotoController extends Controller
{
  public function addAction($idalbum)
  {
    if (false === $this->get('security.context')->isGranted(
        'IS_AUTHENTICATED_FULLY'
							    )) {
      throw new AccessDeniedException();
    }
    $user = $this->container->get('security.context')->getToken()->getUser();
    $album = $this->getDoctrine()->getRepository('ssnSuperAdminBundle:Albums')->find($idalbum);

    $photo = new Photos();
    $form = $this->createFormBuilder($photo)
      ->add('file')
      ->getForm()
      ;

    if ($this->getRequest()->isMethod('POST')) {
      $form->bind($this->getRequest());
      if ($form->isValid()) {
	$em = $this->getDoctrine()->getManager();
	$photo->setAlbum($album);
	$em->persist($photo);
	$em->flush();

	return $this->redirect($this->generateUrl("consultalbum", array('idalbum' => $idalbum)));
      }
    }
    return $this->render('ssnMediaBundle:Photo:add.html.twig',array('form' => $form->createView(), 'user' => $user, 'album' => $album));
  }
  public function delAction($idpicture)
  {
    if (false === $this->get('security.context')->isGranted(
        'IS_AUTHENTICATED_FULLY'
                                                            )) {
      throw new AccessDeniedException();
    }
    $user = $this->container->get('security.context')->getToken()->getUser();
    $photo = $this->getDoctrine()->getRepository('ssnSuperAdminBundle:Photos')->find($idpicture);
    $idalbum = $photo->getAlbum()->getId();
    $em = $this->getDoctrine()->getManager();
    $em->remove($photo);
    $em->flush();
    return $this->redirect($this->generateUrl("consultalbum", array('idalbum' => $idalbum)));
 }
}