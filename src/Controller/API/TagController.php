<?php

namespace App\Controller\API;

use App\Entity\Tag;
use App\Models\Tags as TagsModel;
use App\Repository\TagRepository;
use App\Services\TagService;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tags', name: 'tags.')]
class TagController extends AbstractController
{
    #[Route('', name: 'list', methods: ['GET'])]
    public function list(TagRepository $tagRepository): Response
    {
        return $this->json($tagRepository->findAll());
    }

    #[Route('', name: 'create', methods: ['POST'])]
    public function create(TagsModel\CreateDataObject $dataObject, TagService $tagService, EntityManagerInterface $entityManager): Response
    {
        $tag = $tagService->createIfNotExist($dataObject);
        $entityManager->flush();
        return $this->json($tag);
    }


    #[Route('/{name}', methods:['GET'])]
    public function getOne(Tag $tag):Response
    {
        return $this->json($tag);
    }
}
