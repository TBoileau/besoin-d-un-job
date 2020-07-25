<?php

namespace App\Tests;

use App\Gateway\UserGateway;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;

/**
 * Trait AuthenticationTrait
 * @package App\Tests
 */
trait AuthenticationTrait
{
    /**
     * @param string $email
     * @return KernelBrowser
     */
    public static function createAuthenticatedClient(string $email): KernelBrowser
    {
        $client = static::createClient();

        $client->getCookieJar()->clear();

        /** @var SessionInterface $session */
        $session = $client->getContainer()->get('session');

        $user = self::$container->get(UserGateway::class)->findByEmail($email);

        $firewallContext = 'main';

        $token = new UsernamePasswordToken($user, $user->getPassword(), $firewallContext, $user->getRoles());
        $session->set('_security_' . $firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $client->getCookieJar()->set($cookie);

        return $client;
    }
}
