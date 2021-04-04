<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectFormType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project/new", name="new_project")
     */
    public function new(EntityManagerInterface $entityManager,Request $request)
    {
        $form = $this->createForm(ProjectFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $project = new Project();
            $project->setName($data['Titre']);
            $project->setLanguage($data['Langue']);

            $entityManager->persist($project);
            $entityManager->flush();

            return $this->redirectToRoute('app_project');
        }

        return $this->render('project/new.html.twig', [
            'projectForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/project", name="app_project")
     */
    public function index(ProjectRepository $projectRepository)
    {
        $projects = $projectRepository->findAll();

        return $this->render('project/list.html.twig', [
            'projects' => $projects
        ]);
    }
}
