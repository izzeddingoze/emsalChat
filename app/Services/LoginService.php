<?php

namespace App\Services;

use App\DTOs\LoginUserDTO;
use App\DTOs\ResultDTO;
use App\Models\User;
use App\Services\Interfaces\LoginServiceInterface;
use Illuminate\Support\Facades\Auth;

class LoginService implements LoginServiceInterface
{

    public function loginUser(LoginUserDTO $loginUserDTO): ResultDTO
    {
        $credentials = [
            'email' => $loginUserDTO->email,
            'password' => $loginUserDTO->password,
        ];

        if (Auth::attempt($credentials))
            return ResultDTO::success('Giriş başarılı!', Auth::user());
        else
            return ResultDTO::fail('Kullanıcı adı veya şifre hatalı');
    }

    public function logout(User $user): ResultDTO
    {
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        request()->session()->flush();
        return ResultDTO::success('Çıkış başarılı!');
    }
}
