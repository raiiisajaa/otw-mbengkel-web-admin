<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - OTW Mbengkel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #1a1a1a;
        }

        /* --- BACKGROUND MANAGEMENT --- */
        .hero-wrapper {
            position: relative;
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* Layer Gambar Blur */
        .hero-bg {
            position: absolute;
            top: -20px; left: -20px; right: -20px; bottom: -20px;
            background-image: url("{{ asset('assets/img/bg_bengkel.jpg') }}");
            background-size: cover;
            background-position: center;
            /* Efek Blur Sekitar 40% */
            filter: blur(15px); 
            z-index: 1;
            transform: scale(1.1); /* Zoom sedikit agar pinggiran blur tidak putih */
        }

        /* Layer Gelap (Overlay) agar teks terbaca */
        .hero-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.55); /* Gelap 55% */
            z-index: 2;
        }

        /* --- LOGO POSITIONING (UKURAN SEDANG) --- */
        .logo-container {
            position: absolute;
            top: 50px;
            width: 100%;
            padding: 0 60px;
            display: flex;
            justify-content: space-between;
            z-index: 10;
        }

        .brand-logo {
            height: 85px; /* Ukuran Sedang (Medium) */
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3)); /* Bayangan agar logo pop-up */
            transition: transform 0.3s ease;
        }

        .brand-logo:hover {
            transform: scale(1.05);
        }

        /* --- TYPOGRAPHY & CONTENT --- */
        .content-center {
            position: relative;
            z-index: 10;
            text-align: center;
            color: white;
            padding: 20px;
        }

        .display-text {
            font-weight: 700;
            font-size: 4.5rem; /* Besar & Jelas */
            margin-bottom: 0;
            letter-spacing: -1.5px;
            text-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .subtitle-text {
            font-weight: 300;
            font-size: 1.1rem;
            margin-top: 10px;
            margin-bottom: 60px;
            letter-spacing: 1px;
            opacity: 0.9;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        /* --- GLASS BUTTON (Minimalis) --- */
        .btn-minimal {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 45px;
            color: white;
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            border: 1.5px solid rgba(255, 255, 255, 0.7);
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.05); /* Hampir transparan */
            backdrop-filter: blur(5px);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .btn-minimal:hover {
            background: white;
            color: black;
            border-color: white;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.25);
        }

        /* Responsive Mobile */
        @media (max-width: 768px) {
            .brand-logo { height: 50px; }
            .logo-container { padding: 0 20px; top: 30px; }
            .display-text { font-size: 3rem; }
        }
    </style>
</head>
<body>

    <div class="hero-wrapper">
        <div class="hero-bg"></div>

        <div class="hero-overlay"></div>

        <div class="logo-container">
            <img src="{{ asset('assets/img/logo_mbengkel.png') }}" alt="OTW Mbengkel" class="brand-logo">
            
            <img src="{{ asset('assets/img/logo_otewe_komputer.png') }}" alt="Partner Logo" class="brand-logo">
        </div>

        <div class="content-center">
            <h1 class="display-text">Hello, Welcome 👋</h1>
            <p class="subtitle-text">Sistem manajemen bengkel modern yang terintegrasi langsung dengan aplikasi mobile pelanggan.</p>
    
            <a href="{{ route('admin.login') }}" class="btn-minimal">
                To the login page <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div style="position: absolute; bottom: 90px; z-index: 10; color: rgb(255, 255, 255); font-size: 12px; letter-spacing: 2px;">
            PROJECT KERJA PRAKTEK © 2025
        </div>
    </div>

</body>
</html>