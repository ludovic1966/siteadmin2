<?php

namespace Siteadmin2Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Siteadmin2Bundle\Entity\Siteadmin2;
use Siteadmin2Bundle\Form\Siteadmin2Type;

/**
 * Siteadmin2 controller.
 *
 */
class Siteadmin2Controller extends Controller
{
    /**
     * Lists all Siteadmin2 entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $siteadmin2s = $em->getRepository('Siteadmin2Bundle:Siteadmin2')->findAll();

        return $this->render('Siteadmin2Bundle:siteadmin2:index.html.twig', array(
            'siteadmin2s' => $siteadmin2s,
        ));
    }

    /**
     * Creates a new Siteadmin2 entity.
     *
     */
    public function newAction(Request $request)
    {
        $siteadmin2 = new Siteadmin2();
        $form = $this->createForm('Siteadmin2Bundle\Form\Siteadmin2Type', $siteadmin2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($siteadmin2);
            $em->flush();

            return $this->redirectToRoute('siteadmin2_show', array('id' => $siteadmin2->getId()));
        }

        return $this->render('Siteadmin2Bundle:siteadmin2:new.html.twig', array(
            'siteadmin2' => $siteadmin2,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Siteadmin2 entity.
     *
     */
    public function showAction(Siteadmin2 $siteadmin2)
    {
        $deleteForm = $this->createDeleteForm($siteadmin2);

        return $this->render('Siteadmin2Bundle:siteadmin2:show.html.twig', array(
            'siteadmin2' => $siteadmin2,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Siteadmin2 entity.
     *
     */
    public function editAction(Request $request, Siteadmin2 $siteadmin2)
    {
        $deleteForm = $this->createDeleteForm($siteadmin2);
        $editForm = $this->createForm('Siteadmin2Bundle\Form\Siteadmin2Type', $siteadmin2);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($siteadmin2);
            $em->flush();

            return $this->redirectToRoute('siteadmin2_edit', array('id' => $siteadmin2->getId()));
        }

        return $this->render('Siteadmin2Bundle:siteadmin2:edit.html.twig', array(
            'siteadmin2' => $siteadmin2,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Siteadmin2 entity.
     *
     */
    public function deleteAction(Request $request, Siteadmin2 $siteadmin2)
    {
        $form = $this->createDeleteForm($siteadmin2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($siteadmin2);
            $em->flush();
        }

        return $this->redirectToRoute('siteadmin2_index');
    }

    /**
     * Creates a form to delete a Siteadmin2 entity.
     *
     * @param Siteadmin2 $siteadmin2 The Siteadmin2 entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Siteadmin2 $siteadmin2)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('siteadmin2_delete', array('id' => $siteadmin2->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
