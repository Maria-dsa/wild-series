<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }
    #[Route('/{categoryName}', name: 'show')]
    public function show(string $categoryName, ProgramRepository $programRepository): Response
    {
        if (!$categoryName) {
            throw $this->createNotFoundException(
                'No program with Category Name : ' . $categoryName . ' found in program\'s table.'
            );
        }
        $programs = $programRepository->findByCategory($categoryName);

        return $this->render('category/show.html.twig', [
            'programs' => $programs,
        ]);
    }
}
