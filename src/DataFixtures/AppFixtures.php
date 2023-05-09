<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $cat1 = new Category();
        $cat1->setName("Billard");
        $cat1->setUrlImage("https://images.unsplash.com/photo-1589759118394-f5cfe6178fd3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8YmlsbGFyZHN8ZW58MHx8MHx8&auto=format&fit=crop&w=700&q=60");
        $manager->persist($cat1);

        $cat2 = new Category();
        $cat2->setName("Pétanque");
        $cat2->setUrlImage("https://images.unsplash.com/photo-1595971649687-0901985665a1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8UCVDMyVBOXRhbnF1ZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=700&q=60");
        $manager->persist($cat2);

        $cat3 = new Category();
        $cat3->setName("Escalade");
        $cat3->setUrlImage("https://images.unsplash.com/photo-1564769662533-4f00a87b4056?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8ZXNjYWxhZGUlMjBkZSUyMGJsb2N8ZW58MHx8MHx8&auto=format&fit=crop&w=700&q=60");
        $manager->persist($cat3);

        $cat4 = new Category();
        $cat4->setName("VTT");
        $cat4->setUrlImage("https://images.unsplash.com/photo-1566480047210-b10eaa1f8095?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8dnR0fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=700&q=60");
        $manager->persist($cat4);

        $cat5 = new Category();
        $cat5->setName("Baby-foot");
        $cat5->setUrlImage("https://images.unsplash.com/photo-1667991833334-10d614d2a5c2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8YmFieSUyMGZvb3R8ZW58MHx8MHx8&auto=format&fit=crop&w=700&q=60");
        $manager->persist($cat5);

        $cat6 = new Category();
        $cat6->setName("Randonnée");
        $cat6->setUrlImage("https://images.unsplash.com/photo-1635745488837-ffa006eaf9cf?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTd8fFJhbmRvbm4lQzMlQTllfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=700&q=60");
        $manager->persist($cat6);

        $manager->flush();
    }
}
