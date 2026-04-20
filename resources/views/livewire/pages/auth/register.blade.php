<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
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
            <form wire:submit="register">

                <!-- Nama -->
                <div style="margin-bottom:12px;">
                    <label style="color:white;font-size:13px;">Nama</label>
                    <input type="text" wire:model="name"
                        style="width:100%;padding:9px;border-radius:6px;border:none;margin-top:4px;">
                </div>

                <!-- Email -->
                <div style="margin-bottom:12px;">
                    <label style="color:white;font-size:13px;">Email</label>
                    <input type="email" wire:model="email"
                        style="width:100%;padding:9px;border-radius:6px;border:none;margin-top:4px;">
                </div>

                <!-- Password -->
                <div style="margin-bottom:12px;">
                    <label style="color:white;font-size:13px;">Password</label>
                    <input type="password" wire:model="password"
                        style="width:100%;padding:9px;border-radius:6px;border:none;margin-top:4px;">
                </div>

                <!-- Konfirmasi -->
                <div style="margin-bottom:18px;">
                    <label style="color:white;font-size:13px;">Konfirmasi Password</label>
                    <input type="password" wire:model="password_confirmation"
                        style="width:100%;padding:9px;border-radius:6px;border:none;margin-top:4px;">
                </div>

                <!-- FOOTER -->
                <div style="display:flex;justify-content:space-between;align-items:center;">

                    <a href="{{ route('login') }}" style="color:#93C5FD;font-size:12px;">
                        Sudah punya akun?
                    </a>

                    <button style="background:#3B82F6;color:white;padding:7px 16px;border-radius:6px;font-weight:600;">
                        Register
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>