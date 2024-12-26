<?php

namespace App\Http\Controllers\Security;

use App\Actions\CreateUser;
use App\Data\CreateUserData;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class RegisteredUserController extends Controller
{
    /**
     * Handles an incoming registration request.
     */
    public function store(CreateUserData $data): RedirectResponse
    {
        auth()->login(
            CreateUser::run($data),
            remember: true,
        );

        return redirect('/');
    }
}
