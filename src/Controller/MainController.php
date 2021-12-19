<?php

namespace App\Controller;

use App\Utils\Exceptions\CustomException;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    public function error(\Throwable $exception, ?LoggerInterface $logger, KernelInterface $kernel, TranslatorInterface $translator): Response
    {

        $dataResponse = [
            "message" => $translator->trans($exception->getMessage()),
        ];
        if ($kernel->getEnvironment() === 'dev') {
            //$dataResponse["trace"] = $exception->getTrace();
        }

        if (!$exception instanceof CustomException) {
            return $this->json($dataResponse);
        }

        return $this->json($dataResponse, $exception->getHTTPCode());

    }
}
