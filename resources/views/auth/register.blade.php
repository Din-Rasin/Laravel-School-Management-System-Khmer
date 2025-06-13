
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="login-right">
        <div class="login-right-wrap">
            <!-- Confetti Canvas -->
            <canvas id="confetti-canvas"></canvas>

            <div class="form-container">
                <h1>Sign Up</h1>
                <p class="account-subtitle">Enter details to create your account</p>

                <form action="{{ route('register') }}" method="POST" id="signup-form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name <span class="login-danger">*</span></label>
                        <div class="input-wrapper">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-required="true">
                            <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email <span class="login-danger">*</span></label>
                        <div class="input-wrapper">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-required="true">
                            <span class="profile-views"><i class="fas fa-envelope"></i></span>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" name="image" value="{{ config('app.default_profile_image', 'photo_defaults.jpg') }}">

                    <div class="form-group">
                        <label for="role_name">Role Name <span class="login-danger">*</span></label>
                        <select class="form-control select @error('role_name') is-invalid @enderror" name="role_name" id="role_name" aria-required="true">
                            <option selected disabled>Role Type</option>
                            @forelse ($role as $name)
                                <option value="{{ $name->role_type }}">{{ $name->role_type }}</option>
                            @empty
                                <option disabled>No roles available</option>
                            @endforelse
                        </select>
                        @error('role_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password <span class="login-danger">*</span></label>
                        <div class="input-wrapper">
                            <input type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" id="password" aria-required="true">
                            <span class="profile-views toggle-password" data-target="password"><i class="fas fa-eye"></i></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password <span class="login-danger">*</span></label>
                        <div class="input-wrapper">
                            <input type="password" class="form-control pass-confirm @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" aria-required="true">
                            <span class="profile-views toggle-password" data-target="password_confirmation"><i class="fas fa-eye"></i></span>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="dont-have">
                        Already Registered? <a href="{{ route('login') }}">Login</a>
                    </div>

                    <div class="form-group mb-0">
                        <button class="btn btn-primary btn-block" type="submit">Register</button>
                    </div>
                </form>

                <div class="login-or">
                    <span class="or-line"></span>
                    <span class="span-or">or</span>
                </div>

                <div class="social-login">
                    <a href="/auth/google" aria-label="Sign up with Google"><i class="fab fa-google"></i><span class="sr-only">Google</span></a>
                    <a href="/auth/facebook" aria-label="Sign up with Facebook"><i class="fab fa-facebook-f"></i><span class="sr-only">Facebook</span></a>
                    <a href="/auth/twitter" aria-label="Sign up with Twitter"><i class="fab fa-twitter"></i><span class="sr-only">Twitter</span></a>
                    <a href="/auth/linkedin" aria-label="Sign up with LinkedIn"><i class="fab fa-linkedin-in"></i><span class="sr-only">LinkedIn</span></a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Confetti Animation
            const canvas = document.getElementById('confetti-canvas');
            const ctx = canvas.getContext('2d');
            let particles = [];
            const colors = ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff', '#00ffff', '#ff8800', '#ff0088'];
            let animationRunning = true;

            function resizeCanvas() {
                canvas.width = canvas.offsetWidth;
                canvas.height = canvas.offsetHeight;
                particles = particles.filter(p => p.y < canvas.height && p.x < canvas.width);
            }

            function initParticles() {
                particles = [];
                for (let i = 0; i < 50; i++) {
                    particles.push({
                        x: Math.random() * canvas.width,
                        y: Math.random() * canvas.height,
                        size: Math.random() * 6 + 2,
                        color: colors[Math.floor(Math.random() * colors.length)],
                        speedX: Math.random() * 2 - 1,
                        speedY: Math.random() * 2 + 0.5,
                        angle: 0,
                        spin: Math.random() * 0.1 - 0.05
                    });
                }
            }

            function animateConfetti() {
                if (!animationRunning) return;
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                particles.forEach(p => {
                    ctx.save();
                    ctx.translate(p.x, p.y);
                    ctx.rotate(p.angle);
                    ctx.fillStyle = p.color;
                    ctx.fillRect(-p.size / 2, -p.size / 2, p.size, p.size);
                    ctx.restore();

                    p.angle += p.spin;
                    p.x += p.speedX;
                    p.y += p.speedY;

                    if (p.y > canvas.height) {
                        p.y = 0;
                        p.x = Math.random() * canvas.width;
                        p.speedY = Math.random() * 2 + 0.5;
                    }
                });
                requestAnimationFrame(animateConfetti);
            }

            if (ctx) {
                resizeCanvas();
                initParticles();
                animateConfetti();
                let resizeTimeout;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(resizeCanvas, 100);
                });
            }

            // Pause confetti when form is focused
            document.querySelectorAll('input, select').forEach(input => {
                input.addEventListener('focus', () => {
                    animationRunning = false;
                });
                input.addEventListener('blur', () => {
                    animationRunning = true;
                    animateConfetti();
                });
            });

            // Password Toggle
            document.querySelectorAll('.toggle-password').forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    const icon = this.querySelector('i');
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.replace('fa-eye', 'fa-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.replace('fa-eye-slash', 'fa-eye');
                    }
                });
            });

            // Input Effects
            const inputs = document.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.borderColor = '#667eea';
                    this.style.boxShadow = '0 0 0 3px rgba(102, 126, 234, 0.2)';
                    this.style.transform = 'scale(1.02)';
                });
                input.addEventListener('blur', function() {
                    this.style.borderColor = '#e0e6ed';
                    this.style.boxShadow = 'inset 0 1px 3px rgba(0,0,0,0.1)';
                    this.style.transform = 'scale(1)';
                });
            });

            // Real-time Password Validation
            document.getElementById('password').addEventListener('input', function() {
                const password = this.value;
                const strength = password.length >= 8 ? 'strong' : 'weak';
                this.classList.toggle('strong-password', strength === 'strong');
            });

            // Button Hover and Click
            const button = document.querySelector('.btn-primary');
            if (button) {
                button.addEventListener('mouseenter', function() {
                    this.style.boxShadow = '0 6px 20px rgba(102, 126, 234, 0.6)';
                });
                button.addEventListener('mouseleave', function() {
                    this.style.boxShadow = '0 4px 15px rgba(102, 126, 234, 0.4)';
                });
            }
        });
    </script>

    <style>
        /* CSS Variables for Reusability */
        :root {
            --primary-color: #667eea;
            --primary-dark: #764ba2;
            --danger-color: #ff4757;
            --success-color: #28a745;
            --text-dark: #495057;
            --text-light: #e2e8f0;
            --border-color: #e0e6ed;
            --border-dark: #4a5568;
            --bg-light: rgba(255, 255, 255, 0.9);
            --bg-dark: rgba(30, 30, 30, 0.9);
            --shadow-light: 0 10px 30px rgba(0, 0, 0, 0.2);
            --shadow-dark: 0 10px 30px rgba(0, 0, 0, 0.5);
            --shadow-primary: 0 4px 15px rgba(102, 126, 234, 0.4);
            --transition: all 0.3s ease;
            --font-primary: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-primary);
            line-height: 1.6;
            background-color: #f0f2f5;
        }

        /* Main Container */
        .login-right {
            max-width: 500px;
            width: 100%;
            margin: 2rem auto;
            animation: pulse 4s infinite;
        }

        .login-right-wrap {
            position: relative;
            padding: 2rem;
            background: linear-gradient(135deg, var(--bg-light) 0%, rgba(240, 248, 255, 0.9) 100%);
            border-radius: 20px;
            box-shadow: var(--shadow-light), 0 0 0 2px #ffffff, 0 0 50px rgba(100, 149, 237, 0.5);
            transform-style: preserve-3d;
            animation: float 6s ease-in-out infinite;
            overflow: hidden;
        }

        #confetti-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .form-container {
            position: relative;
            z-index: 2;
        }

        /* Typography */
        h1 {
            text-align: center;
            color: var(--primary-color);
            font-size: 2.5rem;
            margin-bottom: 0.625rem;
            font-weight: 700;
            letter-spacing: 0.0625rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .account-subtitle {
            text-align: center;
            color: var(--text-dark);
            margin-bottom: 1.875rem;
            font-size: 1rem;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
            font-weight: 600;
        }

        .login-danger {
            color: var(--danger-color);
        }

        .input-wrapper {
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1.25rem 0.75rem 2.5rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            background-color: #f8fafc;
            transition: var(--transition);
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            font-size: 1rem;
        }

        .form-control:focus-visible {
            outline: 3px solid var(--primary-color);
            outline-offset: 2px;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
            transform: scale(1.02);
        }

        .form-control.is-invalid {
            border-color: var(--danger-color);
            background-color: #fff5f5;
            background-image: url('/images/error.svg');
            background-repeat: no-repeat;
            background-position: right 0.9375rem center;
            background-size: 1.25rem;
        }

        .strong-password {
            border-color: var(--success-color) !important;
            background-image: url('/images/check.svg');
            background-repeat: no-repeat;
            background-position: right 0.9375rem center;
            background-size: 1.25rem;
        }

        .profile-views {
            position: absolute;
            left: 0.9375rem;
            top: 50%;
            transform: translateY(-50%);
            color: #7d8da1;
        }

        .toggle-password {
            right: 0.9375rem;
            left: auto;
            cursor: pointer;
        }

        /* Buttons */
        .btn-primary {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow-primary);
        }

        .btn-primary:hover {
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .btn-primary:active {
            transform: scale(0.98);
        }

        /* Links and Text */
        .dont-have {
            text-align: center;
            margin: 1.25rem 0;
            color: var(--text-dark);
        }

        .dont-have a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .dont-have a:hover {
            color: var(--primary-dark);
        }

        /* Separator */
        .login-or {
            margin: 1.5625rem 0;
            text-align: center;
            position: relative;
        }

        .or-line {
            display: block;
            height: 1px;
            background: linear-gradient(to right, transparent, var(--border-color), transparent);
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
        }

        .span-or {
            display: inline-block;
            padding: 0 0.9375rem;
            background: white;
            position: relative;
            z-index: 1;
            color: var(--text-dark);
            font-size: 0.875rem;
        }

        /* Social Login */
        .social-login {
            display: flex;
            justify-content: center;
            gap: 0.9375rem;
        }

        .social-login a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            color: white;
            font-size: 1.2rem;
            transition: var(--transition);
            text-decoration: none;
        }

        .social-login a:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .social-login a:nth-child(1) {
            background: linear-gradient(135deg, #4285F4 0%, #34A853 50%, #FBBC05 100%);
            box-shadow: 0 4px 10px rgba(66, 133, 244, 0.3);
        }

        .social-login a:nth-child(2) {
            background: linear-gradient(135deg, #1877F2 0%, #0A5AC2 100%);
            box-shadow: 0 4px 10px rgba(24, 119, 242, 0.3);
        }

        .social-login a:nth-child(3) {
            background: linear-gradient(135deg, #1DA1F2 0%, #0D8ECF 100%);
            box-shadow: 0 4px 10px rgba(29, 161, 242, 0.3);
        }

        .social-login a:nth-child(4) {
            background: linear-gradient(135deg, #0077B5 0%, #006097 100%);
            box-shadow: 0 4px 10px rgba(0, 119, 181, 0.3);
        }

        /* Screen Reader Only */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0;
        }

        /* Animations */
        @keyframes float {
            0% { transform: translateY(0) rotateY(0deg) rotateX(0deg); }
            50% { transform: translateY(-0.625rem) rotateY(2deg) rotateX(2deg); }
            100% { transform: translateY(0) rotateY(0deg) rotateX(0deg); }
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.4); }
            70% { box-shadow: 0 0 0 0.625rem rgba(102, 126, 234, 0); }
            100% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0); }
        }

        /* Responsive Design */
        @media (max-width: 576px) {
            .login-right-wrap {
                padding: 1.25rem;
            }
            h1 {
                font-size: 2rem;
            }
            .form-control {
                padding: 0.625rem 0.9375rem 0.625rem 2.1875rem;
            }
        }

        /* Dark Mode */
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #1a202c;
            }
            .login-right-wrap {
                background: linear-gradient(135deg, var(--bg-dark) 0%, rgba(50, 50, 50, 0.9) 100%);
                box-shadow: var(--shadow-dark), 0 0 0 2px #333333, 0 0 50px rgba(100, 149, 237, 0.3);
            }
            .form-control {
                background-color: #2d3748;
                color: var(--text-light);
                border-color: var(--border-dark);
            }
            h1, .form-group label, .dont-have, .span-or {
                color: var(--text-light);
            }
            .or-line {
                background: linear-gradient(to right, transparent, var(--border-dark), transparent);
            }
            .dont-have a {
                color: #a0b3f7;
            }
            .dont-have a:hover {
                color: #7f9cf5;
            }
        }
    </style>
</body>
</html>
