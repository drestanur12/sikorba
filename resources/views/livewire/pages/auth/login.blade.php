<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div class="min-h-screen flex items-center justify-center bg-cover bg-center"
    style="background-image:url('/images/bg-login.png');">

    <!-- CONTAINER -->
    <div style="width:100%; max-width:360px; margin:auto;">

        <!-- CARD -->
        <div style="
            background:#020B24;
            border:1px solid rgba(255,255,255,0.1);
            border-radius:16px;
            padding:28px;
            box-shadow:0 20px 40px rgba(0,0,0,0.5);
        ">

            <!-- HEADER -->
            <div style="text-align:center;margin-bottom:20px;">

                <img src="/images/logo-sikorba.png" style="width:80px;margin:auto;display:block;margin-bottom:8px;">

                <h1 style="color:white;font-size:22px;font-weight:bold;letter-spacing:1px;">
                    SIKORBA
                </h1>

                <p style="color:#9DB7FF;font-size:12px;">
                    Sistem Kontrol Keliling<br>
                    Rutan Banjarnegara
                </p>

                <div style="width:60px;height:3px;background:#FACC15;margin:10px auto;border-radius:10px;"></div>

            </div>

            <!-- FORM -->
            <form wire:submit="login">

                <!-- Email -->
                <div style="margin-bottom:12px;">
                    <label style="color:white;font-size:13px;">Email</label>
                    <input type="email" wire:model="form.email"
                        style="width:100%;padding:9px;border-radius:6px;border:none;margin-top:4px;">
                </div>

                <!-- Password -->
                <div style="margin-bottom:12px;">
                    <label style="color:white;font-size:13px;">Password</label>
                    <input type="password" wire:model="form.password"
                        style="width:100%;padding:9px;border-radius:6px;border:none;margin-top:4px;">
                </div>

                <!-- Remember -->
                <div style="margin-bottom:18px;color:white;font-size:13px;">
                    <label style="display:flex;align-items:center;">
                        <input type="checkbox" wire:model="form.remember" style="margin-right:6px;">
                        Remember me
                    </label>
                </div>

                <!-- FOOTER -->
                <div style="display:flex;justify-content:space-between;align-items:center;">

                    <a href="{{ route('password.request') }}" style="color:#93C5FD;font-size:12px;">
                        Forgot password?
                    </a>

                    <button style="background:#3B82F6;color:white;padding:7px 16px;border-radius:6px;font-weight:600;">
                        Login
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>