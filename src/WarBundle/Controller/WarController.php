<?php

namespace WarBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use WarBundle\Entity\War;
use WarBundle\Form\WarType;

/**
 * War controller.
 *
 * @Route("/war")
 */
class WarController extends Controller
{
    /**
     * Lists all War entities.
     *
     * @Route("/", name="war_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $wars = $em->getRepository('WarBundle:War')->findAll();

        return $this->render('war/index.html.twig', array(
            'wars' => $wars,
        ));
    }

    /**
     * Creates a new War entity.
     *
     * @Route("/new", name="war_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $war = new War();
        $form = $this->createForm('WarBundle\Form\WarType', $war);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($war);
            $em->flush();

            return $this->redirectToRoute('war_show', array('id' => $war->getId()));
        }

        return $this->render('war/new.html.twig', array(
            'war' => $war,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a War entity.
     *
     * @Route("/{id}", name="war_show")
     * @Method("GET")
     */
    public function showAction(War $war)
    {
        $deleteForm = $this->createDeleteForm($war);

        return $this->render('war/show.html.twig', array(
            'war' => $war,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing War entity.
     *
     * @Route("/{id}/edit", name="war_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, War $war)
    {
        $deleteForm = $this->createDeleteForm($war);
        $editForm = $this->createForm('WarBundle\Form\WarType', $war);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($war);
            $em->flush();

            return $this->redirectToRoute('war_edit', array('id' => $war->getId()));
        }

        return $this->render('war/edit.html.twig', array(
            'war' => $war,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a War entity.
     *
     * @Route("/{id}", name="war_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, War $war)
    {
        $form = $this->createDeleteForm($war);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($war);
            $em->flush();
        }

        return $this->redirectToRoute('war_index');
    }

    /**
     * Creates a form to delete a War entity.
     *
     * @param War $war The War entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(War $war)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('war_delete', array('id' => $war->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
