<?php

namespace App\DataFixtures;

use App\Entity\Pays;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();

        $admin->setLogin('KellyG')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->encoder->encodePassword(
                $admin,
                "blablabla"
            ));

        $manager->persist($admin);
        

        $faker = Factory::create();

        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setLogin($faker->username)
                // Pas obligatoire car par défaut dans getRoles, c'est par défaut
                // ->setRoles(['ROLE_USER])
                ->setPassword($faker->password);

            $manager->persist($user);

        }


        // get data from csv file
        $paysFile = fopen(__DIR__ .'/../../data/ListeDePays.csv', 'r');

        $row = 0;
        if ($paysFile !== false) {
            $array_file_data = array();
            while (($data = fgetcsv($paysFile, 1000)) !== false) {
                $pays = new Pays();
                $pays->setNom($data[0]);

                $manager->persist($pays);
            }
        }

        $manager->flush();
    }
}
