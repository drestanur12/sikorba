<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIKORBA</title>

    @vite(['resources/css/app.css'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background: #020B24;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        /* partikel */
        body::before {
            content: "";
            position: fixed;
            width: 200%;
            height: 200%;
            background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px);
            background-size: 40px 40px;
            animation: moveParticles 40s linear infinite;
            z-index: -1;
        }

        @keyframes moveParticles {
            from {
                transform: translate(0, 0);
            }

            to {
                transform: translate(-200px, -200px);
            }
        }

        /* card */
        .card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            padding: 40px;
            border-radius: 20px;
            width: 420px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }

        /* logo animasi */
        .logo {
    width: 150px;          /* ukuran logo lebih besar */
    display: block;        /* supaya bisa di-center */
    margin: 0 auto 15px;   /* auto kiri kanan = center */
    animation: float 4s ease-in-out infinite;
}
        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0);
            }
        }

        /* tombol */
        .btn {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-login {
            background: #3B82F6;
            color: white;
        }

        .btn-login:hover {
            background: #2563EB;
            transform: scale(1.05);
        }

        .btn-register {
            background: #FACC15;
            color: #041E4D;
        }

        .btn-register:hover {
            background: #EAB308;
            transform: scale(1.05);
        }
    </style>

</head>

<body>

    <div class="card">

        <img src="/images/logo-sikorba.png" class="logo">

        <h1 style="margin-top:15px;">SIKORBA</h1>

        <p style="color:#BBD2FF;">
            Sistem Kontrol Keliling<br>
            Rutan Banjarnegara
        </p>

        <div style="width:100px;height:4px;background:#FACC15;margin:20px auto;border-radius:10px;"></div>

        <a href="{{ route('login') }}" class="btn btn-login">
            <i class="fa-solid fa-right-to-bracket"></i>
            Login
        </a>

        <a href="{{ route('register') }}" class="btn btn-register">
            <i class="fa-solid fa-user-plus"></i>
            Registrasi
        </a>

        <p style="font-size:12px;color:#AFC8FF;margin-top:30px;">
            © {{ date('Y') }} Rumah Tahanan Negara Banjarnegara
        </p>

    </div>

</body>

</html>