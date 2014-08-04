<?php

namespace ssn\Bundle\SecurityBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use ssn\Bundle\SecurityBundle\Form\Type\UsersType;
use ssn\Bundle\SuperAdminBundle\Entity\Users;

class RegisterController extends Controller
{
  public function indexAction($name)
  {
    return $this->render('ssnSecurityBundle:Register:register.html.twig', array('name' => $name));
  }
  public function registerAction()
  {
    $users = new Users();
    $form = $this->createForm(new \ssn\Bundle\SecurityBundle\Form\Type\UsersType(), $users);
    $request = $this->get('request');
    if ($request->getMethod() == 'POST') {
      $form->bind($request);
      if ($form->isValid()) {
	$data = $form->getData();
	$factory = $this->get('security.encoder_factory');
	$encoder = $factory->getEncoder($users);
	$password = $encoder->encodePassword($users->getPassword(), $users->getSalt());
	$users->setPassword($password);
	$em =  $this->getDoctrine()->getEntityManager();
	$qb = $em->createQuery('Select u.username From ssnSuperAdminBundle:Users u Where u.username=\''.$data->getUsername().'\'');
	$data->setRoles	('ROLE_USER');
	$data->setIsActive(true);
	try
	  {
	    $em->persist($data);
	    $em->flush();
	  }
	catch(\Exception $e){
	  return $this->render('ssnSecurityBundle:Register:register.html.twig', array('form' => $form->createView()));
	}
	return $this->render('ssnSecurityBundle:Register:register_success.html.twig', array('data' => $data));
      }
    }
    return $this->render('ssnSecurityBundle:Register:register.html.twig', array('form' => $form->createView()));
  }
}
?>