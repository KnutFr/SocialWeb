<?php

namespace ssn\Bundle\AdminBundle\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ssn\Bundle\SuperAdminBundle\Entity\Users;
use \DateTime;

class SettingsController extends Controller
{
    public function indexAction()
    {
      if (false === $this->get('security.context')->isGranted(
        'IS_AUTHENTICATED_FULLY'
							      )) {
        throw new AccessDeniedException();
      }
      $myUser = new Users();
      $user = $this->container->get('security.context')->getToken()->getUser();
      $form = $this->createFormBuilder()
	->add('birthday', 'birthday')
	->getForm()
	;
      $form->add('gender', 'choice', array(
						    'choices'   => array(
									 'm'   => 'Men',
									 'f' => 'Woman',
									 'o'   => 'Other',
									 ),
						    'multiple'  => false,
						    ));
      $form->add('city', 'text');
      $form->add('country', 'text');
      $form->add('phone', 'text');
      $form->add('presentation', 'textarea');
      $form->add('avatar', 'file');
      $form->add('password', 'repeated', array(
						  'first_name' => 'password',
						  'second_name' => 'confirm',
						  'type' => 'password',
						  ));

      return $this->render('ssnAdminBundle:Settings:index.html.twig', array('user' => $user, 'form' => $form->createView()));
    }
}
