<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Episode;
use App\Entity\User;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/comment', name: 'app_comment_')]

class CommentController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CommentRepository $commentRepository): Response
    {
        return $this->render('comment/index.html.twig', [
            'comments' => $commentRepository->findAll(),
        ]);
    }
    #[Route('/new/{episodeId}',
        name: 'new',
        requirements: ['episodeId' => '\d+'],
        methods: ['GET', 'POST'])
    ]
    #[Entity('episode', options: ['mapping' => ['episodeId' => 'id']])]
    public function new(Request $request, CommentRepository $commentRepository, Episode $episode): Response
    {
        // Create a new Comment Object
        $comment = new Comment();
        // Create the associated Form
        $form = $this->createForm(CommentType::class, $comment);
        // Get data from HTTP request
        $form->handleRequest($request);
        // Was the form submitted ?
        if ($form->isSubmitted() && $form->isValid()) {
            // Deal with the submitted data
            //$user = $this->getUser();
            $comment ->setAuthor($this->getUser());
            $comment ->setEpisode($episode);
            // For example : persist & flush the entity
            $commentRepository->save($comment, true);
            // Once the form is submitted, valid and the data inserted in database, you can define the success flash message
            $this->addFlash('success', 'Le commentaire a été créé avec succès');
            // And redirect to a route that display the result
            return $this->redirectToRoute('app_comment_index');
        }
        // Render the form (best practice)
        return $this->renderForm('comment/new.html.twig', [
            'form' => $form,
            'comment' =>$comment,

        ]);
    }

  }
