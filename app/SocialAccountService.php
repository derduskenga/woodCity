<?php
/**
 * Created by PhpStorm.
 * User: heri
 * Date: 18/12/16
 * Time: 21:35
 */

namespace App;

use Laravel\Socialite\Contracts\Provider;

class SocialAccountService
{
    public function createOrGetUser(Provider $provider)
    {

        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);

                $client = Role::where('name', '=', 'client')->first();

                $user->attachRole($client); // this has to come after the user is saved

            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}