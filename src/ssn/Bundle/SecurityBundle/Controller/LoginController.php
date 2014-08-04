<?php

namespace ssn\Bundle\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
    use ssn\Bundle\SecurityBundle\Form\Type\PasswordType;
    use ssn\Bundle\SuperAdminBundle\Entity\Users;
class LoginController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ssnSecurityBundle:Login:login.html.twig', array('name' => $name));
    }

    public function loginAction()
    {
        
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
            'ssnSecurityBundle:Login:login.html.twig',
            array(
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );
    	//return $this->render('ssnSecurityBundle:Login:login.html.twig', array('name' => $name));
    }

    public function passwordAction(){
        $users = new Users();

            $form = $this->createForm(new \ssn\Bundle\SecurityBundle\Form\Type\PasswordType(), $users);

            $request = $this->get('request');
            if ($request->getMethod() == 'POST') {
            $form->bind($request);
              if ($form->isValid()) {
                    $data = $form->getData();
              

            $em =  $this->getDoctrine()->getEntityManager();
            $qb = $em->createQuery('Select u.password From ssnSuperAdminBundle:Users u Where u.mail=\''.$data->getMail().'\'');
            $p = $qb->getResult();
//                        return $this->render('ssnSecurityBundle:Login:password_done.html.twig',array('data' => $p));

            $pass= $p[0]['password'];

             $message = \Swift_Message::newInstance()
            ->setSubject('KIKOOOOOO')
            ->setFrom('2sn4242@gmail.com')
            ->setTo($data->getMail())
            ->setBody('chui trop un mail kikoo voila ton mdp : '.$pass);

            $this->get('mailer')->send($message);
            return $this->render('ssnSecurityBundle:Login:password_done.html.twig');
                  }
              }
                    return $this->render('ssnSecurityBundle:Login:password.html.twig', array('form' => $form->createView()));

        }
    }
