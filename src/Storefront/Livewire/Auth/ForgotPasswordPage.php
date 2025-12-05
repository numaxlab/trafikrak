<?php

namespace Testa\Storefront\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;

class ForgotPasswordPage extends Page
{
    public string $email = '';

    public function render(): View
    {
        return view('testa::storefront.livewire.auth.forgot-password')
            ->title(__('Recuperar contraseña'));
    }

    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('A reset link will be sent if the account exists.'));
    }
}