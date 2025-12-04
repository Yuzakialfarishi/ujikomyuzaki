<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel TastyFood</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
            animation: slideUp 0.5s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .login-header h1 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .login-header p {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .login-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            display: block;
        }

        .login-body {
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #374151;
            font-size: 0.95rem;
        }

        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 0.3rem rgba(102, 126, 234, 0.1);
        }

        .form-group input.is-invalid {
            border-color: #ef4444;
            background-color: #fef2f2;
        }

        .form-group input.is-invalid:focus {
            box-shadow: 0 0 0 0.3rem rgba(239, 68, 68, 0.1);
        }

        .error-message {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 6px;
            display: block;
        }

        .remember-group {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
            gap: 8px;
        }

        .remember-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .remember-group label {
            margin: 0;
            font-size: 0.9rem;
            color: #6b7280;
            cursor: pointer;
        }

        .login-btn {
            width: 100%;
            padding: 12px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-footer {
            text-align: center;
            padding: 20px 30px;
            background: #f9fafb;
            border-top: 1px solid #e5e7eb;
            font-size: 0.9rem;
            color: #6b7280;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.9rem;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }

        .alert-danger i {
            font-size: 1.1rem;
        }

        .security-features {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .security-feature {
            text-align: center;
            font-size: 0.8rem;
            color: #9ca3af;
        }

        .security-feature i {
            display: block;
            font-size: 1.5rem;
            color: #667eea;
            margin-bottom: 6px;
        }

        @media (max-width: 480px) {
            .login-container {
                border-radius: 8px;
            }

            .login-header {
                padding: 30px 20px;
            }

            .login-header h1 {
                font-size: 1.5rem;
            }

            .login-body {
                padding: 30px 20px;
            }

            .login-footer {
                padding: 15px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <i class="fas fa-lock login-icon"></i>
            <h1>Admin Panel</h1>
            <p>TastyFood Management System</p>
        </div>

        <div class="login-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $errors->first('email') }}</span>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope" style="margin-right: 6px;"></i>Email
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           placeholder="Masukkan email Anda"
                           value="{{ old('email') }}"
                           class="@error('email') is-invalid @enderror"
                           required
                           autofocus>
                    @error('email')
                        <span class="error-message">
                            <i class="fas fa-times-circle"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-key" style="margin-right: 6px;"></i>Password
                    </label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           placeholder="Masukkan password Anda"
                           class="@error('password') is-invalid @enderror"
                           required>
                    @error('password')
                        <span class="error-message">
                            <i class="fas fa-times-circle"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="remember-group">
                    <input type="checkbox" id="remember" name="remember" value="true">
                    <label for="remember">Ingat saya di perangkat ini</label>
                </div>

                <!-- Login Button -->
                <button type="submit" class="login-btn">
                    <i class="fas fa-sign-in-alt"></i> Masuk ke Admin Panel
                </button>
            </form>

            <!-- Security Features -->
            <div class="security-features">
                <div class="security-feature">
                    <i class="fas fa-shield-alt"></i>
                    <span>Aman</span>
                </div>
                <div class="security-feature">
                    <i class="fas fa-lock"></i>
                    <span>Terenkripsi</span>
                </div>
                <div class="security-feature">
                    <i class="fas fa-mobile-alt"></i>
                    <span>Responsive</span>
                </div>
            </div>
        </div>

        <div class="login-footer">
            <i class="fas fa-info-circle" style="margin-right: 6px;"></i>
            <span style="display: block; margin-top: 8px; font-size: 0.85rem;">
                Demo: Email: <strong>admin@gmail.com</strong> | Password: <strong>123456</strong>
            </span>
        </div>
    </div>
</body>
</html>
