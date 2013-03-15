<?php

namespace Shop\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Shop\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUsers implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user -> setUsername('user');
        $user -> setPassword($this->encodePassword($user, 'user'));
        $manager -> persist($user);

        $admin = new User();
        $admin -> setUsername('admin');
        $admin -> setPassword($this->encodePassword($admin, 'admin'));
        $admin -> setRoles(array('ROLE_ADMIN'));
        $manager -> persist($admin);

        $manager -> flush();
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this -> container = $container;
    }

    private function encodePassword($user, $plainPassword)
    {
        $encoder = $this -> container -> get('security.encoder_factory')->getEncoder($user);

        return $encoder -> encodePassword($plainPassword, $user->getSalt());
    }

}

