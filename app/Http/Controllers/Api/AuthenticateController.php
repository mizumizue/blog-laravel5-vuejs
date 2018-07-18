<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;

/**
 * JWTAuthでの認証用コントローラー
 */
class AuthenticateController extends ApiController
{
    /**
     * 認証結果を返す
     */
    public function authenticate(Request $request)
    {
        // EmailとPasswordで認証
        $credentials = $request->only('email', 'password');
        try {
            // 認証トークンの発行
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user = User::where('email', $request->email)->first();
        return response()->json(compact('user', 'token'));
    }

    /**
     * 現在のUserを返す
     */
    public function getCurrentUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return response()->json(compact('user'));
    }

    /**
     * JWTトークンの削除
     */
    public function logout(Request $request)
    {
    }
}
