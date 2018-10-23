<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\EventListener\FullCalendarListener;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/annonce")
 */
class AnnonceController extends AbstractController
{

    /**
     * @Route("/", name="annonce_index", methods="GET")
     */
    public function index(): Response
    {
        $annonces = $this->getDoctrine()
            ->getRepository(Annonce::class)
            ->findAll();

        return $this->render('annonce/index.html.twig', ['annonces' => $annonces]);
    }

    /**
     * @Route("/new", name="annonce_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $annonce = new Annonce();
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($annonce);
            $em->flush();

            return $this->redirectToRoute('annonce_index');
        }

        return $this->render('annonce/new.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{adressemailbien}", name="annonce_show", methods="GET")
     */
    public function show(Annonce $annonce): Response
    {
        var_dump(get_class($this->container));
        $maila = $annonce->getAdressemailbien();
        return $this->render('annonce/show.html.twig', ['annonce' => $annonce]);
    }

    /**
     * @Route("/{adressemailbien}/edit", name="annonce_edit", methods="GET|POST")
     */
    public function edit(Request $request, Annonce $annonce): Response
    {
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('annonce_edit', ['adressemailbien' => $annonce->getAdressemailbien()]);
        }

        return $this->render('annonce/edit.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{adressemailbien}", name="annonce_delete", methods="DELETE")
     */
    public function delete(Request $request, Annonce $annonce): Response
    {
        if ($this->isCsrfTokenValid('delete'.$annonce->getAdressemailbien(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($annonce);
            $em->flush();
        }

        return $this->redirectToRoute('annonce_index');
    }
}
