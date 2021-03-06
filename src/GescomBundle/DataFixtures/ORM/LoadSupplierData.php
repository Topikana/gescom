<?php

namespace GescomBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use GescomBundle\Entity\Supplier;

use Faker;

/**
 * Class LoadSupplierData
 * @package GescomBundle\DataFixtures\ORM
 */
class LoadSupplierData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $em
     */
    public function load(ObjectManager $em)
    {
        $faker = Faker\Factory::create();

        /**
         * Supplier Area
         */
        for ($i = 0; $i < 100; $i++){
            $supplier = new Supplier();
            $supplier->setName($faker->firstName . ' ' . $faker->companySuffix);
            $supplier->setAddress($faker->address);
            // get name + domain.ext for email
            $email = strtolower(str_replace(' ', '', $supplier->getName()));
            $email .= '@' . $faker->freeEmailDomain;
            $supplier->setEmail($email);
            $supplier->setPostalCode($faker->numberBetween(9999, 99999));
            $supplier->setTown($faker->city);
            $supplier->setSiret($faker->phoneNumber);
            $supplier->setWebUrl($faker->url);
            $supplier->setDeliveryTime($faker->numberBetween(1, 30));
            $supplier->setNote($faker->numberBetween(1, 5));
            $em->persist($supplier);
            $this->setReference('supplier_id_'.$i, $supplier);
        }

        /**
         * Save Generates
         */
        $em->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }

}