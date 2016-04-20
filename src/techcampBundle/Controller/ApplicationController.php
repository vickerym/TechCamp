<?php

namespace techcampBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use techcampBundle\Entity\Application;
use techcampBundle\Form\ApplicationType;

/**
 * Application controller.
 *
 * @Route("user/application")
 */
class ApplicationController extends Controller
{
    /**
     * Lists all Application entities.
     *
     * @Route("/", name="admin_application_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $applications = $em->getRepository('techcampBundle:Application')->findAll();

        return $this->render('application/index.html.twig', array(
            'applications' => $applications,
        ));
    }

    /**
     * Creates a new Application entity.
     *
     * @Route("/new", name="admin_application_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $application = new Application();
        $form = $this->createForm('techcampBundle\Form\ApplicationType', $application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($application);
            $em->flush();

            return $this->redirectToRoute('admin_application_show', array('id' => $application->getId()));
        }

        return $this->render('application/new.html.twig', array(
            'application' => $application,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Application entity.
     *
     * @Route("/{id}", name="admin_application_show")
     * @Method("GET")
     */
    public function showAction(Application $application)
    {
        $deleteForm = $this->createDeleteForm($application);

        return $this->render('application/show.html.twig', array(
            'application' => $application,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Application entity.
     *
     * @Route("/{id}/edit", name="admin_application_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Application $application)
    {
        $deleteForm = $this->createDeleteForm($application);
        $editForm = $this->createForm('techcampBundle\Form\ApplicationType', $application);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($application);
            $em->flush();

            return $this->redirectToRoute('admin_application_edit', array('id' => $application->getId()));
        }

        return $this->render('application/edit.html.twig', array(
            'application' => $application,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Application entity.
     *
     * @Route("/{id}", name="admin_application_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Application $application)
    {
        $form = $this->createDeleteForm($application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($application);
            $em->flush();
        }

        return $this->redirectToRoute('admin_application_index');
    }

    /**
     * Creates a form to delete a Application entity.
     *
     * @param Application $application The Application entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Application $application)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_application_delete', array('id' => $application->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
