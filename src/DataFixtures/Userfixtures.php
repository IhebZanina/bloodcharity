<?php

namespace App\DataFixtures;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class Userfixtures extends Fixture
{
    
    private $encoder ;

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder=$encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
       // create 20 products! Bam!
            $user = new User();
            $user->setUsername($faker->firstName);
            $user->setPassword($this->encoder->encodePassword($user,'normaluser'));
            
            $user2 = new User();
            $user2->setUsername($faker->firstName);
            $user2->setPassword($this->encoder->encodePassword($user,'admin'));

            $manager->persist($user);
            $manager->persist($user2);

        $manager->flush();
    }
}
