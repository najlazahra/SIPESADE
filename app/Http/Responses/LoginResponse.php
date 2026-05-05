<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\LoginResponse as Responsable;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class LoginResponse implements Responsable
{
    public function toResponse($request): RedirectResponse | Redirector
    {
        // Cek Role setelah login
        if (auth()->user()->role === 'admin') {
            return redirect()->intended('/admin'); // Jalur Admin
        }

        return redirect()->intended('/user'); // Jalur Warga
    }
}