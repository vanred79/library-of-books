<?php

namespace frontend\components;

use Yii;
use yii\filters\auth\AuthMethod;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\UnencryptedToken;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Encoding\CannotDecodeContent;

class JwtHttpBearerAuth extends AuthMethod
{
    public $header = 'Authorization';

    public function authenticate($user, $request, $response)
    {
        $authHeader = $request->getHeaders()->get($this->header);
        if ($authHeader !== null && preg_match('/^Bearer\s+(.*?)$/', $authHeader, $matches)) {
            $tokenString = $matches[1];

            $config = Configuration::forSymmetricSigner(
                new Sha256(),
                \Lcobucci\JWT\Signer\Key\InMemory::plainText('my-super-secret-key-1234567890')
            );

            try {
                $token = $config->parser()->parse($tokenString);
                assert($token instanceof \Lcobucci\JWT\Token\Plain);

                if ($config->validator()->validate($token, ...[
                    new \Lcobucci\JWT\Validation\Constraint\SignedWith(
                        $config->signer(),
                        $config->signingKey()
                    ),
                    new \Lcobucci\JWT\Validation\Constraint\ValidAt(
                        new \Lcobucci\Clock\SystemClock(new \DateTimeZone('UTC'))
                    ),
                ])) {
                    return $user->loginByAccessToken($tokenString, get_class($this));
                }
            } catch (CannotDecodeContent $e) {
                return null;
            }
        }
        return null;
    }
}
