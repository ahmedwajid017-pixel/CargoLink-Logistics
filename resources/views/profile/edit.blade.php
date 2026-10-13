<x-app-layout>

```
<x-slot name="header">
    <div class="cl-page-header">
        <div>
            <span class="cl-eyebrow">ACCOUNT SETTINGS</span>
            <h2>My Profile</h2>
            <p>Manage your CargoLink account information</p>
        </div>

        <div class="cl-status">
            <span class="cl-status-dot"></span>
            Active Member
        </div>
    </div>
</x-slot>

<style>
    .cl-profile-page {
        min-height: calc(100vh - 65px);
        background: #f4f7fb;
        padding: 45px 20px 60px;
        font-family: Arial, Helvetica, sans-serif;
        color: #172033;
    }

    .cl-container {
        width: 100%;
        max-width: 1050px;
        margin: 0 auto;
    }

    .cl-page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .cl-page-header h2 {
        margin: 5px 0 3px;
        font-size: 28px;
        font-weight: 800;
        color: #111827;
    }

    .cl-page-header p {
        margin: 0;
        color: #64748b;
        font-size: 15px;
    }

    .cl-eyebrow {
        color: #2563eb;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1.5px;
    }

    .cl-status {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 11px 17px;
        border-radius: 30px;
        background: #eff6ff;
        color: #1d4ed8;
        font-size: 14px;
        font-weight: 700;
        white-space: nowrap;
    }

    .cl-status-dot {
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background: #22c55e;
        box-shadow: 0 0 0 4px #dcfce7;
    }

    .cl-alert {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 25px;
        padding: 17px 20px;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
    }

    .cl-success {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #047857;
    }

    .cl-error {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #b91c1c;
    }

    .cl-card {
        overflow: hidden;
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 15px 45px rgba(15, 23, 42, 0.08);
    }

    .cl-banner {
        position: relative;
        overflow: hidden;
        padding: 42px 45px;
        background: linear-gradient(135deg, #0756c9 0%, #123b91 55%, #172554 100%);
    }

    .cl-banner::before {
        content: "";
        position: absolute;
        width: 280px;
        height: 280px;
        right: -100px;
        top: -150px;
        border-radius: 50%;
        background: rgba(255,255,255,.10);
    }

    .cl-banner::after {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        right: 100px;
        bottom: -130px;
        border-radius: 50%;
        background: rgba(56,189,248,.12);
    }

    .cl-banner-content {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .cl-avatar {
        width: 105px;
        height: 105px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 22px;
        background: #ffffff;
        color: #1555b7;
        font-size: 42px;
        font-weight: 800;
        border: 5px solid rgba(255,255,255,.3);
        box-shadow: 0 12px 30px rgba(0,0,0,.20);
    }

    .cl-member-label {
        margin-bottom: 5px;
        color: #bfdbfe;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .cl-user-name {
        margin: 0;
        color: #ffffff;
        font-size: 32px;
        font-weight: 800;
        line-height: 1.2;
    }

    .cl-user-email {
        margin: 7px 0 0;
        color: #dbeafe;
        font-size: 15px;
    }

    .cl-active-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-top: 13px;
        padding: 7px 13px;
        border: 1px solid rgba(255,255,255,.2);
        border-radius: 30px;
        background: rgba(255,255,255,.12);
        color: #ffffff;
        font-size: 12px;
        font-weight: 700;
    }

    .cl-content {
        padding: 42px 45px;
    }

    .cl-section-title {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 32px;
    }

    .cl-section-icon {
        width: 48px;
        height: 48px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #dbeafe;
        color: #2563eb;
        font-size: 22px;
    }

    .cl-section-title h3 {
        margin: 0;
        color: #111827;
        font-size: 22px;
        font-weight: 800;
    }

    .cl-section-title p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
    }

    .cl-form {
        display: grid;
        gap: 25px;
    }

    .cl-field label {
        display: block;
        margin-bottom: 9px;
        color: #334155;
        font-size: 14px;
        font-weight: 800;
    }

    .cl-required {
        color: #ef4444;
    }

    .cl-optional {
        color: #94a3b8;
        font-weight: 500;
    }

    .cl-input-wrapper {
        position: relative;
    }

    .cl-input-icon {
        position: absolute;
        left: 17px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 18px;
        pointer-events: none;
    }

    .cl-input {
        width: 100%;
        box-sizing: border-box;
        padding: 15px 17px 15px 48px;
        border: 1px solid #cbd5e1;
        border-radius: 11px;
        outline: none;
        background: #f8fafc;
        color: #172033;
        font-family: inherit;
        font-size: 16px;
        font-weight: 500;
        transition: all .2s ease;
    }

    .cl-input::placeholder {
        color: #94a3b8;
    }

    .cl-input:hover {
        border-color: #94a3b8;
        background: #ffffff;
    }

    .cl-input:focus {
        border-color: #2563eb;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(37,99,235,.12);
    }

    .cl-help {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 13px;
        line-height: 1.5;
    }

    .cl-error-text {
        margin: 7px 0 0;
        color: #dc2626;
        font-size: 13px;
        font-weight: 600;
    }

    .cl-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-top: 8px;
        padding-top: 28px;
        border-top: 1px solid #e2e8f0;
    }

    .cl-action-title {
        margin: 0;
        color: #334155;
        font-size: 14px;
        font-weight: 800;
    }

    .cl-action-text {
        margin: 4px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    .cl-save-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 14px 25px;
        border: none;
        border-radius: 11px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #ffffff;
        cursor: pointer;
        font-family: inherit;
        font-size: 15px;
        font-weight: 800;
        box-shadow: 0 8px 20px rgba(37,99,235,.25);
        transition: all .2s ease;
    }

    .cl-save-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(37,99,235,.35);
    }

    .cl-save-btn:active {
        transform: translateY(0);
    }

    .cl-info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-top: 22px;
    }

    .cl-info-box {
        display: flex;
        gap: 14px;
        padding: 21px;
        border-radius: 15px;
        border: 1px solid #dbeafe;
        background: linear-gradient(135deg, #eff6ff, #f8fbff);
    }

    .cl-info-icon {
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #dbeafe;
        color: #2563eb;
        font-size: 18px;
    }

    .cl-info-box h4 {
        margin: 0;
        color: #1e293b;
        font-size: 14px;
        font-weight: 800;
    }

    .cl-info-box p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 13px;
        line-height: 1.6;
    }

    @media (max-width: 700px) {
        .cl-profile-page {
            padding: 25px 14px 40px;
        }

        .cl-page-header {
            align-items: flex-start;
        }

        .cl-status {
            display: none;
        }

        .cl-page-header h2 {
            font-size: 24px;
        }

        .cl-banner {
            padding: 30px 22px;
        }

        .cl-banner-content {
            flex-direction: column;
            text-align: center;
        }

        .cl-user-name {
            font-size: 27px;
        }

        .cl-content {
            padding: 30px 22px;
        }

        .cl-section-title {
            margin-bottom: 25px;
        }

        .cl-actions {
            align-items: stretch;
            flex-direction: column;
        }

        .cl-save-btn {
            width: 100%;
        }

        .cl-info-grid {
            grid-template-columns: 1fr;
        }
    }
    ```css
/* Professional icon visibility fix */
.cl-section-icon i {
    display: inline-block;
    font-size: 22px;
    color: #2563eb;
}

.cl-input-icon i {
    display: inline-block;
    font-size: 18px;
    color: #94a3b8;
}

.cl-info-icon i {
    display: inline-block;
    font-size: 18px;
    color: #2563eb;
}



</style>

<div class="cl-profile-page">
    <div class="cl-container">

        {{-- Success Message --}}
        @if (session('status') === 'profile-updated')
            <div class="cl-alert cl-success">
                <strong>✓</strong>
                <span>
                    Your profile information has been updated successfully.
                </span>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="cl-alert cl-error">
                <div>
                    <strong>Please correct the following:</strong>

                    <ul style="margin: 7px 0 0 18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- Main Card --}}
        <div class="cl-card">

            {{-- Profile Banner --}}
            <div class="cl-banner">
                <div class="cl-banner-content">

                    <div class="cl-avatar">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>

                    <div>
                        <div class="cl-member-label">
                            CargoLink Member
                        </div>

                        <h1 class="cl-user-name">
                            {{ $user->name }}
                        </h1>

                        <p class="cl-user-email">
                            {{ $user->email }}
                        </p>

                        <div class="cl-active-badge">
                            <span class="cl-status-dot"></span>
                            Active Account
                        </div>
                    </div>

                </div>
            </div>

            {{-- Form Content --}}
            <div class="cl-content">

                <div class="cl-section-title">
                    <div class="cl-section-icon">
    <i class="fa-solid fa-user"></i>
                 </div>
                    <div>
                        <h3>Personal Information</h3>

                        <p>
                            Keep your personal and contact information up to date.
                        </p>
                    </div>
                </div>

                <form method="POST"
                      action="{{ route('profile.update') }}"
                      class="cl-form">

                    @csrf
                    @method('PATCH')

                    {{-- Name --}}
                    <div class="cl-field">
                        <label for="name">
                            Full Name
                            <span class="cl-required">*</span>
                        </label>

                        <div class="cl-input-wrapper">
                            <span class="cl-input-icon">
    <i class="fa-solid fa-user"></i>
</span>

                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name', $user->name) }}"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Enter your full name"
                                class="cl-input"
                            >
                        </div>

                        @error('name')
                            <p class="cl-error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="cl-field">
                        <label for="email">
                            Email Address
                            <span class="cl-required">*</span>
                        </label>

                        <div class="cl-input-wrapper">
                            <span class="cl-input-icon">
    <i class="fa-solid fa-envelope"></i>
</span>

                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email', $user->email) }}"
                                required
                                autocomplete="email"
                                placeholder="Enter your email address"
                                class="cl-input"
                            >
                        </div>

                        <p class="cl-help">
                            This email is associated with your CargoLink account.
                        </p>

                        @error('email')
                            <p class="cl-error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="cl-field">
                        <label for="phone">
                            Phone Number
                            <span class="cl-optional">(Optional)</span>
                        </label>

                        <div class="cl-input-wrapper">
                            <span class="cl-input-icon">
    <i class="fa-solid fa-phone"></i>
</span>

                            <input
                                id="phone"
                                name="phone"
                                type="text"
                                value="{{ old('phone', $user->phone) }}"
                                autocomplete="tel"
                                placeholder="+92 300 1234567"
                                class="cl-input"
                            >
                        </div>

                        <p class="cl-help">
                            Your phone number can help CargoLink contact you regarding logistics activities.
                        </p>

                        @error('phone')
                            <p class="cl-error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Save --}}
                    <div class="cl-actions">
                        <div>
                            <p class="cl-action-title">
                                Save your profile changes
                            </p>

                            <p class="cl-action-text">
                                Your updated information will be saved securely.
                            </p>
                        </div>

                        <button type="submit" class="cl-save-btn">
                            <span>✓</span>
                            Save Changes
                        </button>
                    </div>

                </form>
            </div>
        </div>

        {{-- Information Boxes --}}
        <div class="cl-info-grid">

            <div class="cl-info-box">
                <div class="cl-info-icon">
    <i class="fa-solid fa-lock"></i>
</div>

                <div>
                    <h4>Secure Account</h4>

                    <p>
                        Your personal information is protected within your CargoLink account.
                    </p>
                </div>
            </div>

            <div class="cl-info-box">
                <div class="cl-info-icon">
    <i class="fa-solid fa-box"></i>
</div>

                <div>
                    <h4>Logistics Account</h4>

                    <p>
                        Keep your contact details updated for smoother logistics communication.
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>
```

</x-app-layout>
