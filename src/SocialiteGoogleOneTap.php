<?php

namespace Serdud\SocialiteGoogleOneTap;

use Google\Client;
use Illuminate\Support\Arr;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

class SocialiteGoogleOneTap extends AbstractProvider implements ProviderInterface
{
    protected function getAuthUrl($state)
    {
        //
    }

    protected function getTokenUrl()
    {
        //
    }

    /**
     * @param $token
     *
     * @return array
     * @throws InvalidTokenException
     */
    protected function getUserByToken($token): array
    {
        $client = $this->getClient();
        $info = $client->verifyIdToken($token);
        if (!$info) {
            throw new InvalidTokenException('Invalid token');
        }

        return $info;
    }

    /**
     * @param array $user
     *
     * @return User
     */
    protected function mapUserToObject(array $user): User
    {
        return (new User)->setRaw($user)->map([
            'id' => Arr::get($user, 'sub'),
            'nickname' => Arr::get($user, 'nickname'),
            'name' => Arr::get($user, 'name'),
            'email' => Arr::get($user, 'email'),
            'avatar' => $avatarUrl = Arr::get($user, 'picture'),
            'avatar_original' => $avatarUrl,
            'given_name' => Arr::get($user, 'given_name'),
            'family_name' => Arr::get($user, 'family_name'),
        ]);
    }

    /**
     * @return Client
     */
    private function getClient(): Client
    {
        return new Client([
            'client_id' => config('services.google.client_id'),
            'client_secret' => config('services.google.client_secret'),
        ]);
    }
}
