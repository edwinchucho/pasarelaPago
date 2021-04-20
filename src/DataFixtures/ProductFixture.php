<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class ProductFixture extends Fixture
{


    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setTitle('product '.$i)
            ->setPrice(mt_rand(1000, 5000))
            ->setImage($faker->imageUrl(400, 400));
            $manager->persist($product);
        }
        $manager->flush();
    }
}
