<?php

namespace techcampBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use techcampBundle\Entity\Camp;
use techcampBundle\Form\CampType;

/**
 * Camp controller.
 *
 * @Route("/admin/camp")
 */
class CampController extends Controller
{
    /**
     * Lists all Camp entities.
     *
     * @Route("/", name="admin_camp_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $camps = $em->getRepository('techcampBundle:Camp')->findAll();

        return $this->render('camp/index.html.twig', array(
            'camps' => $camps,
        ));
    }

    /**
     * Creates a new Camp entity.
     *
     * @Route("/new", name="admin_camp_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $camp = new Camp();
        $form = $this->createForm('techcampBundle\Form\CampType', $camp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($camp);
            $em->flush();

            return $this->redirectToRoute('admin_camp_show', array('id' => $camp->getId()));
        }

        return $this->render('camp/new.html.twig', array(
            'camp' => $camp,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Camp entity.
     *
     * @Route("/{id}", name="admin_camp_show")
     * @Method("GET")
     */
    public function showAction(Camp $camp)
    {
        $deleteForm = $this->createDeleteForm($camp);

        return $this->render('camp/show.html.twig', array(
            'camp' => $camp,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Camp entity.
     *
     * @Route("/{id}/edit", name="admin_camp_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Camp $camp)
    {
        $deleteForm = $this->createDeleteForm($camp);
        $editForm = $this->createForm('techcampBundle\Form\CampType', $camp);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($camp);
            $em->flush();

            return $this->redirectToRoute('admin_camp_edit', array('id' => $camp->getId()));
        }

        return $this->render('camp/edit.html.twig', array(
            'camp' => $camp,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Camp entity.
     *
     * @Route("/{id}", name="admin_camp_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Camp $camp)
    {
        $form = $this->createDeleteForm($camp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($camp);
            $em->flush();
        }

        return $this->redirectToRoute('admin_camp_index');
    }

    /**
     * Creates a form to delete a Camp entity.
     *
     * @param Camp $camp The Camp entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Camp $camp)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_camp_delete', array('id' => $camp->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
