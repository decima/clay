<?php

namespace App\DataFixtures;

use App\Entity\Asset;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AssetFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->data() as $key => $item) {

            $asset = (new Asset())
                ->setName($item['name'])
                ->setPath($item['path'])
                ->setUrl($item['url']);
            foreach ($item['tags'] as $tag) {
                $asset->addTag($this->getReference($tag));
            }

            $manager->persist($asset);
            $this->addReference($key, $asset);
        }

        $manager->flush();
    }

    public function data(): array
    {
        return [
            'ASSET1' => [
                'name' => 'Asset 1',
                'tags' => ['TAG1'],
                'path' => '/asset1',
                'url' => 'https://picsum.photos/seed/asset_1/255/255'
            ],
            'ASSET2' => [
                'name' => 'Asset 2',
                'tags' => ['TAG1', 'TAG2'],
                'path' => '/asset2',
                'url' => 'https://picsum.photos/seed/asset_2/255/255'
            ],

            'ASSET3' => [
                'name' => 'Asset 3',
                'tags' => ['TAG1', 'TAG3'],
                'path' => '/asset3',
                'url' => 'https://picsum.photos/seed/asset_3/255/255'
            ],

            'ASSET4' => [
                'name' => 'Asset 4',
                'tags' => ['TAG1', 'TAG2', 'TAG3'],
                'path' => '/asset4',
                'url' => 'https://picsum.photos/seed/asset_4/255/255'
            ],
            'ASSET5' => [
                'name' => 'Asset 5',
                'tags' => [],
                'path' => '/asset5',
                'url' => 'https://picsum.photos/seed/asset_5/255/255'
            ],
        ];
    }


    public function getDependencies()
    {
        return [
            TagFixtures::class,
        ];
    }
}
