<?php

namespace App\Controller\API;

use App\Entity\Asset;
use App\Entity\User;
use App\Services\AssetService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

#[Route('/assets', name: 'assets.')]
class AssetController extends AbstractController
{

    #[Route('', name: 'post', methods: ['POST'])]
    public function post(#[CurrentUser] User $user, AssetService $assetService, Request $request): Response
    {
        $asset = $assetService->storeAsset($user, $request->getContent());

        return $this->json($asset);
    }


    #[Route('/{asset}/show', name: 'show', methods: ['GET'])]
    public function show(Asset $asset): Response
    {
        return $this->redirect($asset->getUrl());
    }
}
