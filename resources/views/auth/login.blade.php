{{-- @extends('layouts.app')
@section('content') --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>3D Dragon Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #504f3d, #110606, #232729);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            perspective: 1200px;
            overflow: hidden;
            animation: gradientShift 15s ease-in-out infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-right {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            border-radius: 25px;
            padding: 50px;
            width: 500px;
            box-shadow: 0 30px 50px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transform-style: preserve-3d;
            transition: transform 0.6s ease, box-shadow 0.6s ease;
            position: relative;
            z-index: 10;
        }

        .login-right:hover {
            transform: translateY(-15px) rotateX(10deg) rotateY(5deg);
            box-shadow: 0 40px 70px rgba(0, 0, 0, 0.4);
        }

        h1 {
            color: #fff;
            font-size: 32px;
            margin-bottom: 15px;
            text-align: center;
            text-shadow: 0 3px 12px rgba(0, 0, 0, 0.4);
            transform: translateZ(30px);
        }

        h2 {
            color: #fff;
            font-size: 26px;
            margin: 25px 0;
            text-align: center;
            transform: translateZ(20px);
        }

        .account-subtitle {
            color: rgba(255, 255, 255, 0.8);
            text-align: center;
            margin-bottom: 25px;
            font-size: 15px;
        }

        .account-subtitle a {
            color: #4ecca3;
            text-decoration: none;
            transition: all 0.3s;
        }

        .account-subtitle a:hover {
            color: #fff;
            text-shadow: 0 0 12px #4ecca3;
        }

        .login-form {
            margin-top: 35px;
            padding: 25px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 15px;
            transform-style: preserve-3d;
            transition: all 0.5s ease;
        }

        .login-form:hover {
            transform: rotateY(8deg) rotateX(3deg) translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        }

        .form-group {
            margin-bottom: 30px;
            position: relative;
            transform-style: preserve-3d;
        }

        .form-group label {
            display: block;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 10px;
            font-size: 15px;
            font-weight: 600;
            transform: translateZ(25px);
        }

        .login-danger {
            color: #ff4757;
        }

        .form-control {
            width: 100%;
            padding: 14px 45px 14px 20px;
            background: rgba(255, 255, 255, 0.12);
            border Quan hệ giữa các quốc gia và khu vực ở Việt Nam và thế giới border: 2px solid rgba(255, 255, 255, 0.25);
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            transition: all 0.4s;
            transform: translateZ(15px);
        }

        .form-control:focus {
            outline: none;
            border-color: #4ecca3;
            box-shadow: 0 0 20px rgba(78, 204, 163, 0.4);
            transform: translateZ(20px);
        }

        .form-control.is-invalid {
            border-color: #ff4757;
            box-shadow: 0 0 15px rgba(255, 71, 87, 0.4);
        }

        .error-message {
            color: #ff4757;
            font-size: 13px;
            margin-top: 8px;
            display: none;
            transform: translateZ(20px);
        }

        .profile-views {
            position: absolute;
            right: 20px;
            top: 42px;
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            transform: translateZ(30px);
            transition: all 0.3s;
        }

        .profile-views:hover {
            color: #4ecca3;
            transform: translateZ(30px) scale(1.3);
        }

        .forgotpass {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            transform: translateZ(15px);
        }

        .remember-me {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .custom_check {
            position: relative;
            padding-left: 35px;
        }

        .custom_check input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 22px;
            width: 22px;
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .custom_check:hover .checkmark {
            background-color: rgba(255, 255, 255, 0.25);
        }

        .custom_check input:checked ~ .checkmark {
            background-color: #4ecca3;
            border-color: #4ecca3;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom_check input:checked ~ .checkmark:after {
            display: block;
        }

        .custom_check .checkmark:after {
            left: 8px;
            top: 4px;
            width: 6px;
            height: 12px;
            border: solid white;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
        }

        .forgotpass a {
            color: #4ecca3;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .forgotpass a:hover {
            color: #fff;
            text-shadow: 0 0 12px #4ecca3;
        }

        .btn-primary {
            background: linear-gradient(45deg, #4ecca3, #2e8b57);
            border: none;
            padding: 14px;
            width: 100%;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s;
            box-shadow: 0 5px 20px rgba(78, 204, 163, 0.4);
            transform: translateZ(25px);
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #2e8b57, #4ecca3);
            transform: translateZ(30px) scale(1.1);
            box-shadow: 0 8px 25px rgba(78, 204, 163, 0.5);
        }

        .btn-primary:active {
            transform: translateZ(25px) scale(0.95);
            box-shadow: 0 3px 15px rgba(78, 204, 163, 0.3);
        }

        .btn-clear {
            background: linear-gradient(45deg, #ff4757, #d32f2f);
            border: none;
            padding: 14px;
            width: 100%;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s;
            box-shadow: 0 5px 20px rgba(255, 71, 87, 0.4);
            transform: translateZ(25px);
        }

        .btn-clear:hover {
            background: linear-gradient(45deg, #d32f2f, #ff4757);
            transform: translateZ(30px) scale(1.1);
            box-shadow: 0 8px 25px rgba(255, 71, 87, 0.5);
        }

        .btn-clear:active {
            transform: translateZ(25px) scale(0.95);
            box-shadow: 0 3px 15px rgba(255, 71, 87, 0.3);
        }

        .login-or {
            position: relative;
            margin: 30px 0;
            text-align: center;
        }

        .or-line {
            display: block;
            height: 2px;
            width: 100%;
            background: rgba(255, 255, 255, 0.3);
        }

        .span-or {
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.15);
            padding: 0 20px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 15px;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 25px;
        }

        .social-login a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            font-size: 20px;
            transition: all 0.4s;
            transform-style: preserve-3d;
        }

        .social-login a:hover {
            transform: translateY(-8px) translateZ(10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        .social-login a:nth-child(1):hover { background: #db4437; }
        .social-login a:nth-child(2):hover { background: #3b5998; }
        .social-login a:nth-child(3):hover { background: #1da1f2; }
        .social-login a:nth-child(4):hover { background: #0077b5; }

        .dragon-canvas {
            position: absolute;
            top: -180px;
            left: 50%;
            transform: translateX(-50%) translateZ(-50px);
            z-index: -1;
            pointer-events: none;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .floating-element {
            position: absolute;
            background: rgba(78, 204, 163, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            z-index: -2;
            animation-duration: 20s;
            animation-timing-function: ease-in-out;
            animation-iteration-count: infinite;
        }

        .element-1 {
            width: 120px;
            height: 120px;
            top: 15%;
            left: 10%;
            animation-name: float1;
        }

        .element-2 {
            width: 180px;
            height: 180px;
            bottom: 15%;
            right: 10%;
            animation-name: float2;
        }

        .element-3 {
            width: 100px;
            height: 100px;
            top: 50%;
            left: 20%;
            animation-name: float3;
        }

        .element-4 {
            width: 140px;
            height: 140px;
            top: 30%;
            right: 15%;
            animation-name: float4;
        }

        @keyframes float1 {
            0%, 100% { transform: translate(0, 0) rotate(0deg) translateZ(-20px); }
            25% { transform: translate(60px, 40px) rotate(10deg) translateZ(-10px); }
            50% { transform: translate(0, 80px) rotate(0deg) translateZ(-20px); }
            75% { transform: translate(-60px, 40px) rotate(-10deg) translateZ(-10px); }
        }

        @keyframes float2 {
            0%, 100% { transform: translate(0, 0) rotate(0deg) translateZ(-20px); }
            25% { transform: translate(-50px, 30px) rotate(-8deg) translateZ(-10px); }
            50% { transform: translate(0, 60px) rotate(0deg) translateZ(-20px); }
            75% { transform: translate(50px, 30px) rotate(8deg) translateZ(-10px); }
        }

        @keyframes float3 {
            0%, 100% { transform: translate(0, 0) rotate(0deg) translateZ(-20px); }
            25% { transform: translate(40px, 20px) rotate(5deg) translateZ(-10px); }
            50% { transform: translate(0, 40px) rotate(0deg) translateZ(-20px); }
            75% { transform: translate(-40px, 20px) rotate(-5deg) translateZ(-10px); }
        }

        @keyframes float4 {
            0%, 100% { transform: translate(0, 0) rotate(0deg) translateZ(-20px); }
            25% { transform: translate(-30px, 50px) rotate(-6deg) translateZ(-10px); }
            50% { transform: translate(0, 70px) rotate(0deg) translateZ(-20px); }
            75% { transform: translate(30px, 50px) rotate(6deg) translateZ(-10px); }
        }

         /* Reset default margins and ensure full-screen coverage */
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(-45deg, #1a1a2e, #16213e, #0f3460, #533d4d);
            background-size: 400% 400%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            perspective: 1200px;
            overflow: hidden;
            animation: gradientFlow 15s ease infinite;
        }

        /* Smooth gradient background animation */
        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Floating Particle Effects */
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            filter: blur(1px);
            z-index: -1;
            animation: floatParticle linear infinite;
        }

        @keyframes floatParticle {
            0% { transform: translateY(0) translateX(0) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(100px) rotate(360deg); opacity: 0; }
        }

        /* Dragon Fire Glow Effect */
        .fire-glow {
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(238, 88, 63, 0.6) 0%, rgba(238, 88, 63, 0) 70%);
            border-radius: 50%;
            filter: blur(30px);
            z-index: -2;
            animation: pulseGlow 4s ease infinite alternate;
        }

        @keyframes pulseGlow {
            0% { transform: scale(0.8); opacity: 0.3; }
            100% { transform: scale(1.2); opacity: 0.7; }
        }

        /* Floating Crystal Elements */
        .crystal {
            position: absolute;
            background: rgba(78, 204, 163, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            z-index: -1;
            clip-path: polygon(
                50% 0%,
                80% 10%,
                100% 35%,
                90% 70%,
                50% 100%,
                10% 70%,
                0% 35%,
                20% 10%
            );
            animation: floatCrystal 25s linear infinite;
        }

        @keyframes floatCrystal {
            0% { transform: translate(0, 0) rotate(0deg) scale(1); opacity: 0.3; }
            25% { transform: translate(50px, 30px) rotate(90deg) scale(1.1); opacity: 0.5; }
            50% { transform: translate(0, 60px) rotate(180deg) scale(0.9); opacity: 0.7; }
            75% { transform: translate(-50px, 30px) rotate(270deg) scale(1.05); opacity: 0.5; }
            100% { transform: translate(0, 0) rotate(360deg) scale(1); opacity: 0.3; }
        }

        /* Energy Wave Effect */
        .energy-wave {
            position: absolute;
            width: 200%;
            height: 200px;
            background: linear-gradient(90deg, rgba(78, 204, 163, 0) 0%, rgba(78, 204, 163, 0.1) 50%, rgba(78, 204, 163, 0) 100%);
            transform: rotate(-5deg);
            z-index: -3;
            animation: waveFlow 20s linear infinite;
        }

        @keyframes waveFlow {
            0% { transform: rotate(-5deg) translateX(-100%); }
            100% { transform: rotate(-5deg) translateX(100%); }
        }

        /* Starlight Twinkle Effect */
        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            filter: blur(0.5px);
            z-index: -1;
            animation: twinkle 3s ease-in-out infinite alternate;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.2; transform: scale(0.8); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        /* Confetti Canvas */
        #confetti-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -4; /* Behind all other elements */
            pointer-events: none; /* Prevent interaction with canvas */
        }
    </style>
</head>
<body>
    <div class="floating-element element-1"></div>
    <div class="floating-element element-2"></div>
    <div class="floating-element element-3"></div>
    <div class="floating-element element-4"></div>

    <div class="login-right">
        <h1>Welcome to Admin Dashboard</h1>
        <p class="account-subtitle">Need an account? <a href="{{ route('register') }}">Sign Up</a></p>
        <h2>Sign in</h2>

        <canvas id="dragonCanvas" class="dragon-canvas"></canvas>
        <div id="particles-js"></div>

        <form action="{{ route('login') }}" method="POST" class="login-form" id="loginForm">
            @csrf
            <div class="form-group">
                <label>Email<span class="login-danger">*</span></label>
                <input type="email" class="form-control" name="email" id="emailInput" required>
                <span class="profile-views"><i class="fas fa-envelope"></i></span>
                <div class="error-message" id="emailError">Please enter a valid email address</div>
            </div>
            <div class="form-group">
                <label>Password <span class="login-danger">*</span></label>
                <input type="password" class="form-control" name="password" id="passwordInput" required>
                <span class="profile-views toggle-password"><i class="fas fa-eye"></i></span>
                <div class="error-message" id="passwordError">Please enter a password</div>
            </div>
            <div class="forgotpass">
                <div class="remember-me">
                    <label class="custom_check"> Remember me
                        <input type="checkbox" name="radio">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <a href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" id="loginButton">Login</button>
            </div>

            <div class="form-group">
                <button class="btn btn-clear btn-block" type="button" id="clearButton">Clear Form</button>
            </div>
        </form>

        <div class="login-or">
            <span class="or-line"></span>
            <span class="span-or">or</span>
        </div>
        <div class="social-login">
            <a href="#"><i class="fab fa-google-plus-g"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        // Toggle password visibility
        document.querySelector('.toggle-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('passwordInput');
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Form submission handler with validation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const emailInput = document.getElementById('emailInput');
            const passwordInput = document.getElementById('passwordInput');
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');
            let isValid = true;

            // Reset error states
            emailInput.classList.remove('is-invalid');
            passwordInput.classList.remove('is-invalid');
            emailError.style.display = 'none';
            passwordError.style.display = 'none';

            // Validate email
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailInput.value || !emailPattern.test(emailInput.value)) {
                emailInput.classList.add('is-invalid');
                emailError.style.display = 'block';
                isValid = false;
            }

            // Validate password
            if (!passwordInput.value || passwordInput.value.length < 6) {
                passwordInput.classList.add('is-invalid');
                passwordError.textContent = 'Password must be at least 6 characters long';
                passwordError.style.display = 'block';
                isValid = false;
            }

            if (isValid) {
                // Multi-stage confetti animation
                const duration = 3 * 1000;
                const animationEnd = Date.now() + duration;
                const colors = ['#4ecca3', '#2e8b57', '#ff4757', '#ffffff', '#1da1f2'];

                function randomInRange(min, max) {
                    return Math.random() * (max - min) + min;
                }

                (function frame() {
                    confetti({
                        particleCount: 100,
                        angle: randomInRange(55, 125),
                        spread: randomInRange(50, 70),
                        origin: { x: randomInRange(0.1, 0.9), y: randomInRange(0.1, 0.9) },
                        colors: colors,
                        zIndex: 1000
                    });

                    if (Date.now() < animationEnd) {
                        requestAnimationFrame(frame);
                    }
                })();

                // Simulate redirect after 3 seconds
                setTimeout(() => {
                    this.submit();
                }, 3000);
            }
        });

        // Clear form button
        document.getElementById('clearButton').addEventListener('click', function() {
            const form = document.getElementById('loginForm');
            form.reset();
            document.getElementById('emailInput').classList.remove('is-invalid');
            document.getElementById('passwordInput').classList.remove('is-invalid');
            document.getElementById('emailError').style.display = 'none';
            document.getElementById('passwordError').style.display = 'none';
        });

        // Dragon animation
        const canvas = document.getElementById('dragonCanvas');
        const ctx = canvas.getContext('2d');
        canvas.width = 350;
        canvas.height = 250;

        let frameCount = 0;
        const dragonParts = [
            { x: 120, y: 120, size: 25, color: '#4ecca3' },
            { x: 150, y: 130, size: 35, color: '#3aa789' },
            { x: 190, y: 125, size: 40, color: '#2e8b57' },
            { x: 230, y: 130, size: 35, color: '#3aa789' },
            { x: 260, y: 120, size: 25, color: '#4ecca3' }
        ];

        function animateDragon() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            for (let i = 0; i < dragonParts.length; i++) {
                const part = dragonParts[i];
                const waveOffset = Math.sin(frameCount * 0.06 + i * 0.6) * 15;

                ctx.beginPath();
                ctx.arc(part.x, part.y + waveOffset, part.size, 0, Math.PI * 2);
                ctx.fillStyle = part.color;
                ctx.fill();
                ctx.closePath();

                if (i > 0) {
                    ctx.beginPath();
                    ctx.moveTo(dragonParts[i-1].x, dragonParts[i-1].y + waveOffset);
                    ctx.lineTo(part.x, part.y + waveOffset);
                    ctx.strokeStyle = part.color;
                    ctx.lineWidth = 12;
                    ctx.stroke();
                    ctx.closePath();
                }
            }

            const wingFlap = Math.sin(frameCount * 0.12) * 25;
            ctx.beginPath();
            ctx.moveTo(170, 120);
            ctx.quadraticCurveTo(140, 90 - wingFlap, 110, 100);
            ctx.quadraticCurveTo(140, 80 - wingFlap, 170, 120);
            ctx.fillStyle = 'rgba(78, 204, 163, 0.7)';
            ctx.fill();

            ctx.beginPath();
            ctx.moveTo(170, 120);
            ctx.quadraticCurveTo(200, 90 - wingFlap, 230, 100);
            ctx.quadraticCurveTo(200, 80 - wingFlap, 170, 120);
            ctx.fill();

            ctx.beginPath();
            ctx.arc(110, 110, 6, 0, Math.PI * 2);
            ctx.fillStyle = '#fff';
            ctx.fill();

            frameCount++;
            requestAnimationFrame(animateDragon);
        }

        animateDragon();

        // Particles.js configuration
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 100, "density": { "enable": true, "value_area": 1000 } },
                "color": { "value": ["#4ecca3", "#ff4757", "#1da1f2"] },
                "shape": { "type": ["circle", "star"], "stroke": { "width": 0 } },
                "opacity": { "value": 0.6, "random": true, "anim": { "enable": true, "speed": 1, "opacity_min": 0.2 } },
                "size": { "value": 4, "random": true, "anim": { "enable": true, "speed": 20, "size_min": 0.2 } },
                "line_linked": { "enable": true, "distance": 150, "color": "#4ecca3", "opacity": 0.5, "width": 1.5 },
                "move": {
                    "enable": true,
                    "speed": 3,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": { "enable": true, "mode": "grab" },
                    "onclick": { "enable": true, "mode": "push" },
                    "resize": true
                },
                "modes": {
                    "grab": { "distance": 150, "line_linked": { "opacity": 1 } },
                    "bubble": { "distance": 300, "size": 50, "duration": 2, "opacity": 8 },
                    "repulse": { "distance": 200, "duration": 0.4 },
                    "push": { "particles_nb": 5 },
                    "remove": { "particles_nb": 2 }
                }
            },
            "retina_detect": true
        });
    </script>
</body>
</html>

{{-- @endsection --}}
