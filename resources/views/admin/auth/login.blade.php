<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - OTW Mbengkel</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body { font-family: 'Poppins', sans-serif; height: 100vh; margin: 0; overflow: hidden; }
        
        /* Background Image (Pastikan ada file car_ws.jpg di folder public/assets/img) */
        .bg-login { 
            background-image: url("{{ asset('assets/img/car_ws.jpg') }}"); 
            background-size: cover; 
            background-position: center; 
            height: 100%; 
            width: 100%; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            position: relative;
        }

        /* Overlay Hitam Transparan supaya tulisan terbaca */
        .bg-login::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.5); /* Gelap 50% */
            z-index: 1;
        }

        /* Kotak Kaca (Glassmorphism) */
        .glass-login-box { 
            width: 450px; 
            padding: 60px;
            background-color: rgba(255, 255, 255, 0.1); 
            backdrop-filter: blur(15px); 
            -webkit-backdrop-filter: blur(15px); 
            border-radius: 20px; 
            border: 1px solid rgba(255, 255, 255, 0.093); 
            box-shadow: 0 15px 35px rgba(0,0,0,0.5); 
            color: white; 
            z-index: 2; /* Di atas overlay */
            text-align: center;
        }

        .form-control-capsule { 
            background-color: rgba(255, 255, 255, 0.9); 
            border: none; 
            border-radius: 50px; 
            padding: 12px 20px; 
            font-size: 14px; 
            margin-bottom: 15px; 
            color: #333; 
        }
        .form-control-capsule:focus { box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.5); outline: none; }
        
        .btn-yellow { 
            width: 100%; 
            padding: 12px; 
            background-color: #F4D35E; 
            color: black; 
            font-weight: 600; 
            border-radius: 50px; 
            border: none; 
            margin-top: 10px; 
            transition: 0.3s; 
        }
        .btn-yellow:hover { background-color: #e0c255; transform: scale(1.02); }

        .alert-glass-error {
            background: rgba(220, 38, 38, 0.8);
            color: white;
            border-radius: 10px;
            padding: 10px;
            font-size: 13px;
            margin-bottom: 20px;
            text-align: left;
        }
    </style>
</head>
<body>

    <div class="bg-login">
        <div class="glass-login-box">
            <img src="{{ asset('assets/img/logo_mbengkel.png') }}" alt="Logo" style="height: 60px; margin-bottom: 20px;">
            
            <h2 class="fw-bold mb-1">Welcome Back</h2>
            <p class="text-white-50 mb-4" style="font-size: 14px;">Masuk untuk mengelola bengkel</p>

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                
                @if(session('error'))
                    <div class="alert-glass-error">
                        <i class="bi bi-exclamation-circle me-2"></i> {{ session('error') }}
                    </div>
                @endif

                <div class="text-start">
                    <input type="email" class="form-control form-control-capsule" name="email" placeholder="Email Admin (admin@otw.com)" required>
                </div>
                <div class="text-start">
                    <input type="password" class="form-control form-control-capsule" name="password" placeholder="Password (123)" required>
                </div>

                <button type="submit" class="btn-yellow">LOGIN</button>
            </form>
            
            <p class="mt-4 mb-0 text-white-50" style="font-size: 11px;">OTW Mbengkel Admin Panel v2.0</p>
        </div>
    </div>

</body>
</html>