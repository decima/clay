<?php

namespace App\Services;

use App\Entity\Tag;
use App\Models\Tags\CreateDataObject;
use App\Repository\TagRepository;
use Doctrine\ORM\EntityManagerInterface;

class TagService
{

    public function __construct(
        private TagRepository $tagRepository,
        private EntityManagerInterface $entityManager,
    ) {
    }

    public function createIfNotExist(CreateDataObject $dataObject): Tag
    {
        if($tag = $this->tagRepository->findOneBy(['name'=>$dataObject->name])) {
            return $tag;
        }
        $tag = (new Tag())
                    ->setName($dataObject->name);
        $this->entityManager->persist($tag);

        return $tag;
    }
}