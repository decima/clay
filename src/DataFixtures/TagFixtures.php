<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->data() as $key => $item) {
            $tag = (new Tag())
                ->setName($item['name']);
            $manager->persist($tag);
            $this->addReference($key, $tag);

        }
        $manager->flush();
    }

    protected function data(): array
    {
        return [
            'TAG1' => ['name' => 'tag1'],
            'TAG2' => ['name' => 'tag2'],
            'TAG3' => ['name' => 'tag3'],
            'TAG4' => ['name' => 'tag4'],
        ];
    }


}
