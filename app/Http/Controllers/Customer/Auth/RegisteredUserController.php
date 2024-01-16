<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\AuthService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('customer.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $request->validated();
        $user = $this->authService->register([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_licence_approved' => $request->is_licence_approved == "on" ? true : false,
            'is_privacy_approved' => $request->is_privacy_approved == "on" ? true : false,
            'is_gdpr_approved' => $request->is_gdpr_approved == "on" ? true : false,
        ]);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
