<?php

namespace App\Controller;

use App\Entity\Disponibilite;
use App\Form\DisponibiliteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/disponibilite")
 */
class DisponibiliteController extends AbstractController
{
    /**
     * @Route("/", name="disponibilite_index", methods="GET")
     */
    public function index(): Response
    {
        $disponibilites = $this->getDoctrine()
            ->getRepository(Disponibilite::class)
            ->findAll();

        return $this->render('disponibilite/index.html.twig', ['disponibilites' => $disponibilites]);
    }

    /**
     * @Route("/new", name="disponibilite_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $disponibilite = new Disponibilite();
        $form = $this->createForm(DisponibiliteType::class, $disponibilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($disponibilite);
            $em->flush();

            return $this->redirectToRoute('disponibilite_index');
        }

        return $this->render('disponibilite/new.html.twig', [
            'disponibilite' => $disponibilite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDisp}", name="disponibilite_show", methods="GET")
     */
    public function show(Disponibilite $disponibilite): Response
    {
        return $this->render('disponibilite/show.html.twig', ['disponibilite' => $disponibilite]);
    }

    /**
     * @Route("/{idDisp}/edit", name="disponibilite_edit", methods="GET|POST")
     */
    public function edit(Request $request, Disponibilite $disponibilite): Response
    {
        $form = $this->createForm(DisponibiliteType::class, $disponibilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('disponibilite_edit', ['idDisp' => $disponibilite->getIdDisp()]);
        }

        return $this->render('disponibilite/edit.html.twig', [
            'disponibilite' => $disponibilite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDisp}", name="disponibilite_delete", methods="DELETE")
     */
    public function delete(Request $request, Disponibilite $disponibilite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$disponibilite->getIdDisp(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($disponibilite);
            $em->flush();
        }

        return $this->redirectToRoute('disponibilite_index');
    }
}
