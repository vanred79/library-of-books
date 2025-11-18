<?php

namespace frontend\controllers;

use yii\rest\Controller;
use Yii;
use yii\web\Response;
use common\models\User;

use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;

class AuthController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;
        return $behaviors;
    }

    // POST /auth/login
    public function actionLogin()
    {
        $request = Yii::$app->request->post();

        $username = $request['username'] ?? null;
        $password = $request['password'] ?? null;

        $user = User::findOne(['username' => $username]);
        if ($user && Yii::$app->security->validatePassword($password, $user->password_hash)) {
            // например, возвращаем auth_key
            $config = Configuration::forSymmetricSigner(
                new Sha256(),
                InMemory::plainText('my-super-secret-key-1234567890')
            );

            $now = new \DateTimeImmutable();

            // Построение токена
            $token = $config->builder()
                ->issuedBy('library-books.local')
                ->permittedFor('library-books.local')
                ->identifiedBy('4f1g23a12aa')
                ->issuedAt($now)
                ->expiresAt($now->modify('+1 hour'))
                ->withClaim('uid', $user->id)
                ->getToken($config->signer(), $config->signingKey());

            return [
                'success' => true,
                'token' => $token->toString(),
            ];
        }

        return [
            'success' => false,
            'message' => 'Неверный логин или пароль',
        ];
    }
}
