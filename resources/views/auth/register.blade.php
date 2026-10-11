<x-guest-layout>

    <style>
        /* Break out of the Breeze guest-layout wrapper so the page uses the full screen */
        .cl-register-page {
            position: fixed;
            inset: 0;
            z-index: 50;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            display: flex;
            padding: clamp(12px, 3vw, 30px);
            background: #f4f7fb;
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .cl-register-page *,
        .cl-register-page *::before,
        .cl-register-page *::after {
            box-sizing: border-box;
        }

        .cl-register-card {
            width: 100%;
            max-width: 1100px;
            margin: auto; /* centers vertically & horizontally, still scrolls safely */
            display: grid;
            grid-template-columns: 0.85fr 1.15fr;
            background: #ffffff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(15, 23, 42, 0.10);
        }

        /* LEFT BRANDING */

        .cl-register-info {
            background: linear-gradient(145deg, #0f4c81, #087fba);
            color: white;
            padding: 30px clamp(24px, 3.5vw, 42px);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .cl-logo {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: rgba(255,255,255,0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .cl-register-info h1 {
            margin: 0 0 7px;
            font-size: clamp(24px, 3vw, 28px);
            font-weight: 800;
        }

        .cl-description {
            margin: 0 0 20px;
            font-size: 13px;
            line-height: 1.5;
            color: rgba(255,255,255,0.9);
        }

        .cl-benefit {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 10px;
            font-size: 13px;
        }

        .cl-check {
            width: 23px;
            height: 23px;
            min-width: 23px;
            border-radius: 50%;
            background: rgba(255,255,255,0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: bold;
        }

        /* FORM */

        .cl-register-form {
            min-width: 0;
            padding: 27px clamp(24px, 4vw, 48px);
        }

        .cl-form-heading {
            margin-bottom: 17px;
        }

        .cl-form-heading h2 {
            margin: 0 0 4px;
            color: #172033;
            font-size: clamp(21px, 2.6vw, 24px);
            font-weight: 800;
        }

        .cl-form-heading p {
            margin: 0;
            color: #64748b;
            font-size: 13px;
        }

        .cl-field {
            margin-bottom: 10px;
        }

        .cl-field label {
            display: block;
            margin-bottom: 4px;
            color: #334155;
            font-size: 13px;
            font-weight: 700;
        }

        .cl-input {
            width: 100%;
            height: 38px;
            padding: 0 12px;
            border: 1px solid #d7dee8;
            border-radius: 8px;
            background: #ffffff;
            color: #172033;
            font-size: 14px;
            outline: none;
        }

        .cl-input::placeholder {
            color: #94a3b8;
        }

        .cl-input:focus {
            border-color: #087fba;
            box-shadow: 0 0 0 3px rgba(8,127,186,0.09);
        }

        .cl-error {
            margin-top: 3px;
            color: #dc2626;
            font-size: 12px;
        }

        .cl-register-button {
            width: 100%;
            height: 40px;
            margin-top: 5px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #0f4c81, #087fba);
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .cl-register-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(8,127,186,0.22);
        }

        .cl-login {
            margin-top: 12px;
            padding-top: 10px;
            border-top: 1px solid #e5eaf0;
            text-align: center;
            color: #64748b;
            font-size: 13px;
        }

        .cl-login a {
            color: #087fba;
            font-weight: 700;
            text-decoration: none;
        }

        .cl-login a:hover {
            text-decoration: underline;
        }

        /* TABLET: stack branding on top of the form */
        @media (max-width: 900px) {
            .cl-register-card {
                grid-template-columns: 1fr;
                max-width: 560px;
            }

            .cl-register-info {
                padding: 24px 30px;
            }

            .cl-register-form {
                padding: 28px 30px;
            }

            /* benefits in a neat row/wrap to keep the top compact */
            .cl-benefits {
                display: flex;
                flex-wrap: wrap;
                gap: 8px 18px;
            }

            .cl-benefit {
                margin-bottom: 0;
            }

            .cl-description {
                margin-bottom: 14px;
            }
        }

        /* PHONES */
        @media (max-width: 520px) {
            .cl-register-page {
                padding: 10px;
            }

            .cl-register-card {
                border-radius: 14px;
            }

            .cl-register-info {
                padding: 20px 20px;
            }

            .cl-logo {
                width: 42px;
                height: 42px;
                margin-bottom: 10px;
            }

            .cl-benefits {
                display: none; /* form comes first on small screens */
            }

            .cl-description {
                margin-bottom: 0;
            }

            .cl-register-form {
                padding: 22px 20px;
            }

            /* 16px stops iOS from zooming into inputs */
            .cl-input {
                height: 44px;
                font-size: 16px;
            }

            .cl-register-button {
                height: 46px;
                font-size: 15px;
            }
        }
    </style>


    <div class="cl-register-page">

        <div class="cl-register-card">

            <!-- BRANDING -->

            <div class="cl-register-info">

                <div class="cl-logo">
                    CL
                </div>

                <h1>CargoLink</h1>

                <p class="cl-description">
                    Create your member account and access
                    your logistics portal.
                </p>

                <div class="cl-benefits">

                    <div class="cl-benefit">
                        <div class="cl-check">✓</div>
                        <span>Manage your profile</span>
                    </div>

                    <div class="cl-benefit">
                        <div class="cl-check">✓</div>
                        <span>Manage shipping documents</span>
                    </div>

                    <div class="cl-benefit">
                        <div class="cl-check">✓</div>
                        <span>Receive notifications</span>
                    </div>

                </div>

            </div>


            <!-- REGISTRATION -->

            <div class="cl-register-form">

                <div class="cl-form-heading">

                    <h2>Create Your Account</h2>

                    <p>
                        Enter your details to get started.
                    </p>

                </div>


                <form method="POST" action="{{ route('register') }}">

                    @csrf


                    <!-- NAME -->

                    <div class="cl-field">

                        <label for="name">
                            Full Name
                        </label>

                        <input
                            id="name"
                            class="cl-input"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Enter your full name"
                        >

                        @error('name')
                            <div class="cl-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- EMAIL -->

                    <div class="cl-field">

                        <label for="email">
                            Email Address
                        </label>

                        <input
                            id="email"
                            class="cl-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="Enter your email address"
                        >

                        @error('email')
                            <div class="cl-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- PASSWORD -->

                    <div class="cl-field">

                        <label for="password">
                            Password
                        </label>

                        <input
                            id="password"
                            class="cl-input"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Create a password"
                        >

                        @error('password')
                            <div class="cl-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- CONFIRM PASSWORD -->

                    <div class="cl-field">

                        <label for="password_confirmation">
                            Confirm Password
                        </label>

                        <input
                            id="password_confirmation"
                            class="cl-input"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm your password"
                        >

                        @error('password_confirmation')
                            <div class="cl-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <button
                        type="submit"
                        class="cl-register-button"
                    >
                        Create Account
                    </button>

                </form>


                <div class="cl-login">

                    Already have an account?

                    <a href="{{ route('login') }}">
                        Sign In
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>