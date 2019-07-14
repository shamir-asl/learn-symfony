<?php

namespace App\Controller;

use App\Entity\AgreeblePizza;
use App\Form\AgreeblePizzaType;
use App\Repository\AgreeblePizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/agreeble/pizza")
 */
class AgreeblePizzaController extends AbstractController
{
    /**
     * @Route("/", name="agreeble_pizza_index", methods={"GET"})
     */
    public function index(AgreeblePizzaRepository $agreeblePizzaRepository): Response
    {
        return $this->render('agreeble_pizza/index.html.twig', [
            'agreeble_pizzas' => $agreeblePizzaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="agreeble_pizza_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $agreeblePizza = new AgreeblePizza();
        $form = $this->createForm(AgreeblePizzaType::class, $agreeblePizza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($agreeblePizza);
            $entityManager->flush();

            return $this->redirectToRoute('agreeble_pizza_index');
        }

        return $this->render('agreeble_pizza/new.html.twig', [
            'agreeble_pizza' => $agreeblePizza,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="agreeble_pizza_show", methods={"GET"})
     */
    public function show(AgreeblePizza $agreeblePizza): Response
    {
        return $this->render('agreeble_pizza/show.html.twig', [
            'agreeble_pizza' => $agreeblePizza,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="agreeble_pizza_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AgreeblePizza $agreeblePizza): Response
    {
        $form = $this->createForm(AgreeblePizzaType::class, $agreeblePizza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('agreeble_pizza_index');
        }

        return $this->render('agreeble_pizza/edit.html.twig', [
            'agreeble_pizza' => $agreeblePizza,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="agreeble_pizza_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AgreeblePizza $agreeblePizza): Response
    {
        if ($this->isCsrfTokenValid('delete'.$agreeblePizza->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($agreeblePizza);
            $entityManager->flush();
        }

        return $this->redirectToRoute('agreeble_pizza_index');
    }
}
