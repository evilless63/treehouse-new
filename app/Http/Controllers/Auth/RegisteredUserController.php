<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|regex:/^[A-Za-zА-Яа-я ]+$/',
            'surname' => 'required|string|max:255|regex:/^[A-Za-zА-Яа-я ]+$/',
            'phone' => 'required|string|max:11|min:11|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ], [
            'name.max' => 'Максимальное количество символов в имени: 255',
            'surname.max' => 'Максимальное количество символов в фамилии: 255',
            'phone.unique' => 'Данный телефон уже привязан к учетной записи, используйте другой.',
            'phone.max' => 'Необходимо указать 11 символов',
            'phone.min' => 'Необходимо указать 11 символов',
            'password.min' => 'Минимальное количество символов в пароле: 8',
            'password.confirmed' => 'Пароли не совпадают',
            'name.regex' => 'Допустимо использовать только буквы и пробел',
            'surname.regex' => 'Допустимо использовать только буквы и пробел'
        ]);

        dd($validatedData);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        $user->callToVerify();
        return redirect(route('phoneverification.notice'));
    }
}
