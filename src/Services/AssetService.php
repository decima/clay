<?php

namespace App\Services;

use App\Entity\Asset;
use App\Entity\User;
use Symfony\Component\Filesystem\Exception\ExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

class AssetService
{
    protected Filesystem $filesystem;
    public function __construct()
    {
        $this->filesystem= new Filesystem();


    }


    public function storeAsset(User $user, string $binaryContent): Asset
    {
        $asset =  new Asset();

    }

}