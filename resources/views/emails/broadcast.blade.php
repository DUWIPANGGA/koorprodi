<!DOCTYPE html>
<html>
<head>
    <title>{{ $subject }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            color: #333333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
        
        .email-header {
            background-color: #f8f9fa;
            padding: 25px 20px;
            text-align: center;
            border-bottom: 1px solid #e9ecef;
        }
        
        .email-logo {
            height: 50px;
            margin-bottom: 15px;
        }
        
        .email-title {
            color: #495057;
            font-size: 20px;
            font-weight: 600;
            margin: 0;
            letter-spacing: 0.5px;
        }
        
        .email-body {
            padding: 30px;
        }
        
        .greeting {
            font-size: 16px;
            margin-bottom: 20px;
            color: #212529;
        }
        
        .content-box {
            background-color: #f8f9fa;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 25px;
            border-left: 4px solid #00AAFF;
        }
        
        .footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 25px 20px;
            text-align: center;
            font-size: 13px;
        }
        
        .social-icons {
            margin: 15px 0 20px;
        }
        
        .social-icon {
            display: inline-block;
            width: 34px;
            height: 34px;
            background-color: #34495e;
            border-radius: 50%;
            color: white;
            text-align: center;
            line-height: 34px;
            margin: 0 4px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background-color: #00AAFF;
            transform: translateY(-2px);
        }
        
        .btn-primary {
            display: inline-block;
            background-color: #00AAFF;
            color: white;
            text-decoration: none;
            padding: 10px 22px;
            border-radius: 4px;
            font-weight: 500;
            margin-top: 15px;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #0077cc;
            box-shadow: 0 2px 8px rgba(0, 170, 255, 0.3);
        }
        
        .signature {
            margin-top: 25px;
            border-top: 1px solid #dee2e6;
            padding-top: 15px;
            color: #6c757d;
            font-size: 14px;
        }
        
        .footer p {
            margin: 8px 0;
            color: #bdc3c7;
        }
        
        .footer a {
            color: #00AAFF;
            text-decoration: none;
        }
        .profile-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #00AAFF;
        }
    </style>
</head>
<body>
    <div class="email-container">
        
        <div class="email-header">
            <img src="https://formadiksi.id/formadiksi.png" alt="FORMADIKSI Logo" class="email-logo">
            <h1 class="email-title">FORUM MAHASISWA BIDIKMISI</h1>
        </div>
        
        <div class="email-body">
            @if($recipientName)
                <p class="greeting">Yth. {{ $recipientName }},</p>
            @else
                <p class="greeting">Yth. Rekan Mahasiswa,</p>
            @endif
            
            <div class="content-box">
                {!! $content !!}
            </div>
            
            @if(isset($actionUrl))
            <div style="text-align: center;">
                <a href="{{ $actionUrl }}" class="btn-primary">Lihat Selengkapnya</a>
            </div>
            @endif
            
            <div class="signature">
                <p>Hormat kami,<br>
                <strong style="color: #00AAFF;">{{ config('app.name') }}</strong></p>
                <p>Setiap langkah kecil adalah bagian dari perjalanan yang besar!</p>
            </div>
        </div>
        
        <div class="footer">
            <div class="social-icons">
                <a href="https://www.instagram.com/formadiksi_polindra/" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="https://api.whatsapp.com/send?phone=6285956404789" class="social-icon"><i class="fab fa-whatsapp"></i></a>
            </div>
            <p>Jl. Lohbener Lama No.8, Indramayu, Jawa Barat 45252</p>
            <p>Email: <a href="mailto:admin@formadiksi.id">admin@formadiksi.id</a></p>
            <p>© 2024 FORMADIKSI POLINDRA. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>