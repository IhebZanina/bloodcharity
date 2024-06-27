<?php

namespace App\DataFixtures;
use App\Entity\Donor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $generatorsa = Factory::create("ar_SA");
        $generator = Factory::create("fr_FR");
        $generatoren = Factory::create("nb_NO");

       // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $donor = new Donor();
            $donor->setCINPassport($generatorsa->nationalIdNumber);
            $donor->setFirstName($generator->firstName);
            $donor->setLastName($generator->lastName);
            $donor->setEmail($generator->email);
            $donor->setCountry('Tunisia');
            $donor->setCity($generator->city);
            $donor->setPhone($generatoren->mobileNumber);
            $donor->setAge($generator->dateTimeThisCentury($max = 'now', $timezone = null));
            $donor->setBloodType($generator->randomElement($array=array('A+','A-','B+','B-','O+','O-','AB+','AB-')));
            $donor->setGenre($generator->randomElement($array=array('Male','Female','Other')));
            $donor->setDatePost($generator->dateTimeThisYear($max = 'now', $timezone = null));


            $manager->persist($donor);
        }

        $manager->flush();
    }
}
