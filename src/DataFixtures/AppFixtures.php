<?php

namespace App\DataFixtures;

use Faker\Generator;
use App\Entity\Ingredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{

    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 50; ++$i) {
            $ingredient = new Ingredient();
            $ingredient->setName($this->faker->unique()->word());
            $ingredient->setPrice(mt_rand(1, 100) / 10);

            $manager->persist($ingredient);
        }

        $manager->flush();
    }
}