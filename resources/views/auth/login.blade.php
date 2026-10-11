<x-guest-layout>

    <style>
        /* Break out of the Breeze guest-layout wrapper so the page uses the full screen */
        .cl-login-page {
            position: fixed;
            inset: 0;
            z-index: 50;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            display: flex;
            padding: clamp(12px, 3vw, 40px);
            background: #f4f7fb;
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .cl-login-page *,
        .cl-login-page *::before,
        .cl-login-page *::after {
            box-sizing: border-box;
        }

        .cl-login-wrapper {
            width: 100%;
            max-width: 1000px;
            margin: auto; /* centers vertically & horizontally, still scrolls safely */
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #ffffff;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.12);
        }

        .cl-brand-section {
            background: linear-gradient(135deg, #0f4c81, #087fba);
            color: white;
            padding: 55px clamp(28px, 4.5vw, 45px);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .cl-logo {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            background: rgba(255,255,255,0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .cl-brand-section h1 {
            font-size: clamp(28px, 3.5vw, 34px);
            font-weight: 800;
            margin: 0 0 15px;
        }

        .cl-brand-section p {
            font-size: 16px;
            line-height: 1.7;
            color: rgba(255,255,255,0.9);
            margin: 0 0 30px;
        }

        .cl-feature {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
            font-size: 15px;
        }

        .cl-feature-icon {
            width: 32px;
            height: 32px;
            min-width: 32px;
            border-radius: 50%;
            background: rgba(255,255,255,0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .cl-form-section {
            min-width: 0;
            padding: 55px clamp(28px, 4.5vw, 45px);
        }

        .cl-form-header {
            margin-bottom: 30px;
        }

        .cl-form-header h2 {
            margin: 0 0 8px;
            font-size: clamp(24px, 3vw, 28px);
            font-weight: 800;
            color: #172033;
        }

        .cl-form-header p {
            margin: 0;
            color: #64748b;
            font-size: 15px;
        }

        .cl-status {
            padding: 12px 14px;
            margin-bottom: 20px;
            border-radius: 9px;
            background: #ecfdf5;
            color: #047857;
            font-size: 14px;
        }

        .cl-field {
            margin-bottom: 20px;
        }

        .cl-field label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
            color: #334155;
        }

        .cl-input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #d7dee8;
            border-radius: 10px;
            background: #f8fafc;
            color: #172033;
            font-size: 15px;
            outline: none;
            transition: 0.2s ease;
        }

        .cl-input:focus {
            border-color: #087fba;
            background: white;
            box-shadow: 0 0 0 3px rgba(8, 127, 186, 0.10);
        }

        .cl-error {
            margin-top: 7px;
            font-size: 13px;
            color: #dc2626;
        }

        .cl-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px 16px;
            margin: 5px 0 25px;
            font-size: 14px;
        }

        .cl-remember {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #64748b;
            white-space: nowrap;
        }

        .cl-remember input {
            accent-color: #087fba;
        }

        .cl-forgot {
            color: #087fba;
            text-decoration: none;
            font-weight: 600;
            white-space: nowrap;
        }

        .cl-forgot:hover {
            text-decoration: underline;
        }

        .cl-button {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 14px 20px;
            background: linear-gradient(135deg, #0f4c81, #087fba);
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .cl-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(8, 127, 186, 0.25);
        }

        .cl-register-link {
            text-align: center;
            margin-top: 22px;
            font-size: 14px;
            color: #64748b;
        }

        .cl-register-link a {
            color: #087fba;
            font-weight: 700;
            text-decoration: none;
        }

        .cl-register-link a:hover {
            text-decoration: underline;
        }

        /* TABLET: stack branding on top of the form */
        @media (max-width: 900px) {
            .cl-login-wrapper {
                grid-template-columns: 1fr;
                max-width: 560px;
            }

            .cl-brand-section {
                padding: 32px 30px;
            }

            .cl-brand-section p {
                margin-bottom: 18px;
            }

            .cl-features {
                display: flex;
                flex-wrap: wrap;
                gap: 10px 20px;
            }

            .cl-feature {
                margin-bottom: 0;
            }

            .cl-form-section {
                padding: 35px 30px;
            }
        }

        /* PHONES */
        @media (max-width: 520px) {
            .cl-login-page {
                padding: 10px;
            }

            .cl-login-wrapper {
                border-radius: 16px;
            }

            .cl-brand-section {
                padding: 22px 22px;
            }

            .cl-logo {
                width: 46px;
                height: 46px;
                font-size: 20px;
                margin-bottom: 14px;
            }

            .cl-brand-section h1 {
                margin-bottom: 8px;
            }

            .cl-brand-section p {
                font-size: 14px;
                line-height: 1.5;
                margin-bottom: 0;
            }

            .cl-features {
                display: none; /* form comes first on small screens */
            }

            .cl-form-section {
                padding: 26px 22px;
            }

            .cl-form-header {
                margin-bottom: 22px;
            }

            /* 16px stops iOS from zooming into inputs */
            .cl-input {
                font-size: 16px;
            }

            .cl-button {
                padding: 15px 20px;
            }
        }
    </style>

    <div class="cl-login-page">

        <div class="cl-login-wrapper">

            <!-- Branding -->
            <div class="cl-brand-section">

                <div class="cl-logo">
                    CL
                </div>

                <h1>CargoLink</h1>

                <p>
                    Welcome back. Sign in to manage your
                    logistics account and access your portal.
                </p>

                <div class="cl-features">

                    <div class="cl-feature">
                        <div class="cl-feature-icon">✓</div>
                        <span>Manage your profile</span>
                    </div>

                    <div class="cl-feature">
                        <div class="cl-feature-icon">✓</div>
                        <span>Access shipping documents</span>
                    </div>

                    <div class="cl-feature">
                        <div class="cl-feature-icon">✓</div>
                        <span>View system notifications</span>
                    </div>

                </div>

            </div>

            <!-- Login Form -->
            <div class="cl-form-section">

                <div class="cl-form-header">
                    <h2>Welcome Back</h2>
                    <p>Sign in to your CargoLink account.</p>
                </div>

                @if (session('status'))
                    <div class="cl-status">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="cl-field">
                        <label for="email">Email Address</label>

                        <input
                            id="email"
                            class="cl-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Enter your email address"
                        >

                        @error('email')
                            <div class="cl-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="cl-field">
                        <label for="password">Password</label>

                        <input
                            id="password"
                            class="cl-input"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter your password"
                        >

                        @error('password')
                            <div class="cl-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="cl-options">

                        <label class="cl-remember">
                            <input
                                type="checkbox"
                                name="remember"
                            >

                            <span>Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a
                                class="cl-forgot"
                                href="{{ route('password.request') }}"
                            >
                                Forgot password?
                            </a>
                        @endif

                    </div>

                    <button type="submit" class="cl-button">
                        Sign In
                    </button>

                </form>

                <div class="cl-register-link">
                    Don't have an account?
                    <a href="{{ route('register') }}">
                        Create Account
                    </a>
                </div>

            </div>

        </div>

    </div>

</x-guest-layout>