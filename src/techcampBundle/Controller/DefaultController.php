<?php

namespace techcampBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

use techcampBundle\Entity\Camp;
use techcampBundle\Entity\Student;
use techcampBundle\Entity\Application;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
    	$campInfo = $this->getDoctrine()
			->getRepository('techcampBundle:Camp')
			->findBy(array("displayedOnHome" => true));
		
        return $this->render('techcampBundle:Default:index.html.twig', array("camps" => $campInfo));
		
		
    }
	
	/**
     * @Route("/faq")
     */	
    public function faqAction()
    {
        return $this->render('techcampBundle:Default:faq.html.twig');
    }
	
	/**
	 * @Route("/application")
	 */
	public function applicationAction()
	{
		$campInfo = $this->getDoctrine()
			->getRepository('techcampBundle:Camp')
			->findBy(array("displayedOnHome" => true));
		
        return $this->render('techcampBundle:Default:application.html.twig', array("camps" => $campInfo));
		
	}
	
	
	/**
	 * @Route("/application/{id}")
	 */
	 public function applicationPhase2Action(Camp $camp)
	 {
	 	$user = $this->get('security.token_storage')->getToken()->getUser();
		$students = $user->getStudents();

		return $this->render('techcampBundle:Default:applicationStudent.html.twig', array("students" => $students, "camp" => $camp));
		
	 }
	 
	 /**
	  * @Route("application/{camp}/{id}")
	  */
	  public function applicationPhase3Action(Camp $camp, Student $student, Request $request)
	  {
	  	
		$application = new Application();
		$application->setStudent($student)->setCamp($camp);
		
		
        $form = $this->createForm('techcampBundle\Form\ApplicationType', $application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($application);
            $em->flush();

            return $this->redirectToRoute('admin_application_show', array('id' => $application->getId()));
        }

        return $this->render('techcampBundle:Default:applicationReview.html.twig', array(
            'application' => $application,
            'student' => $student,
            'camp' => $camp,
            'form' => $form->createView(),
        ));		
	  }
	
	
	/**
	 * @Route("/contact-us")
	 */
	public function contactUsAction()
	{
		return $this->render('techcampBundle:Default:contactUs.html.twig');
	}
	
	/**
     * @Route("/admin")
     */	
    public function adminAction()
    {
        return $this->render('techcampBundle:Default:admin.html.twig');
    }
	
	/**
	 * @Route("/admin_camp_display")
	 */
	public function adminCampDisplayAction()
	{
        return $this->render('techcampBundle:Default:adminCamps.html.twig');		
	}
	
	/**
	 * @Route("/adminUnreviewed")
	 */
	public function adminUnreviewedAction()
	{
		$applicationInfo = $this->getDoctrine()
			->getRepository('techcampBundle:Application')
			->findBy(array("accepted" => true));
				
        return $this->render('techcampBundle:Default:adminUnreviewed.html.twig', array("applications" =>$applicationInfo));		
	}
	
	/**
	 * @Route("/adminEnrolled")
	 */
	public function adminEnrolledAction()
	{
		$applicationInfo = $this->getDoctrine()
			->getRepository('techcampBundle:Application')
			->findBy(array("reviewed" => null));
		
        return $this->render('techcampBundle:Default:adminEnrolled.html.twig', array("applications" => $applicationInfo));			
	}
	
	
	public function loginWidgetAction()
	{
		$csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');
		
		return $this->render('techcampBundle:Default:loginWidget.html.twig', array("csrf_token"=>$csrfToken));
	}
	
	public function displayPageAction($page)
	{
		$pageInfo = $this->getDoctrine()
			->getRepository('techcampBundle:Page')
			->findOneByPageId($page);
			
		if (!$pageInfo) 
		{
			return new Response("");
		}
		else
		{
			return 	new Response($pageInfo->getContent());
		}
	}



	
}
	

