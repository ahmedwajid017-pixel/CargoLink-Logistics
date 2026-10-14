<x-app-layout>

    <style>
        .cl-notification-badge {
    display: inline-block;
    margin-bottom: 12px;
    padding: 5px 11px;
    border-radius: 20px;
    background: #e0f2fe;
    color: #0369a1;
    font-size: 12px;
    font-weight: 700;
}
        .cl-dashboard {
            background: #f4f7fb;
            min-height: calc(100vh - 65px);
            padding: 35px 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .cl-dashboard-container {
            max-width: 1200px;
            margin: auto;
        }

        .cl-welcome {
            background: linear-gradient(135deg, #0f4c81, #087fba);
            color: white;
            border-radius: 18px;
            padding: 30px 35px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(15, 76, 129, 0.18);
        }

        .cl-welcome-label {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.8;
            margin-bottom: 8px;
        }

        .cl-welcome h1 {
            margin: 0 0 8px;
            font-size: 30px;
            font-weight: 800;
        }

        .cl-welcome p {
            margin: 0;
            font-size: 15px;
            opacity: 0.9;
        }

        .cl-section-title {
            margin: 0 0 18px;
            color: #172033;
            font-size: 21px;
            font-weight: 800;
        }

        .cl-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .cl-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            border: 1px solid #e5eaf0;
            box-shadow: 0 7px 20px rgba(15, 23, 42, 0.06);
            transition: 0.2s ease;
        }

        .cl-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(15, 23, 42, 0.09);
        }

        .cl-card-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #e8f4fb;
            color: #087fba;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .cl-card h3 {
            margin: 0 0 8px;
            font-size: 18px;
            font-weight: 800;
            color: #172033;
        }

        .cl-card p {
            margin: 0 0 20px;
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        .cl-card-link {
            display: inline-block;
            color: #087fba;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
        }

        .cl-card-link:hover {
            text-decoration: underline;
        }

        .cl-account {
            margin-top: 25px;
            background: white;
            border-radius: 16px;
            padding: 25px;
            border: 1px solid #e5eaf0;
        }

        .cl-account-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .cl-account-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .cl-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0f4c81, #087fba);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 800;
        }

        .cl-account-name {
            font-size: 17px;
            font-weight: 800;
            color: #172033;
        }

        .cl-account-email {
            margin-top: 3px;
            color: #64748b;
            font-size: 13px;
        }

        .cl-profile-button {
            display: inline-block;
            padding: 10px 17px;
            border-radius: 9px;
            background: #087fba;
            color: white;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
        }

        .cl-profile-button:hover {
            background: #0f4c81;
        }

        @media (max-width: 900px) {
            .cl-cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .cl-dashboard {
                padding: 25px 15px;
            }

            .cl-welcome {
                padding: 25px;
            }

            .cl-welcome h1 {
                font-size: 25px;
            }

            .cl-account-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .cl-profile-button {
                width: 100%;
                text-align: center;
            }
        }
    </style>

    <div class="cl-dashboard">

        <div class="cl-dashboard-container">

            <!-- Welcome -->
            <div class="cl-welcome">

                <div class="cl-welcome-label">
                    Member Dashboard
                </div>

                <h1>
                    Welcome back, {{ Auth::user()->name }}!
                </h1>

                <p>
                    Manage your CargoLink account and access your
                    logistics services from one place.
                </p>

            </div>

            <!-- Quick Access -->
            <h2 class="cl-section-title">
                Quick Access
            </h2>

            <div class="cl-cards">

                <!-- Profile -->
                <div class="cl-card">

                    <div class="cl-card-icon">
                         <i class="fa-solid fa-user"></i>
                    </div>

                    <h3>
                        My Profile
                    </h3>

                    <p>
                        View and update your personal information,
                        contact details and account information.
                    </p>

                    <a
                        href="{{ route('profile.edit') }}"
                        class="cl-card-link"
                    >
                        Manage Profile →
                    </a>

                </div>

                <!-- Documents -->
                <div class="cl-card">

                    <div class="cl-card-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>

                    <h3>
                        Documents
                    </h3>

                    <p>
                        Upload, manage and access your shipping
                        documents from your member portal.
                    </p>

                   
<a
    href="{{ route('documents.index') }}"
    class="cl-card-link"
>
    My Documents →
</a>


                </div>

                <!-- Notifications -->
                <div class="cl-card">

                    <div class="cl-card-icon">
                       <i class="fas fa-bell"></i>
                    </div>

                    <h3>
                        Notifications
                    </h3>

                    <p>
                        Stay updated with important system messages
                        and logistics-related notifications.
                    </p>

                    <a href="{{ route('notifications.index') }}" class="cl-card-link">
    View Notifications
</a>
@php
    $unreadCount = Auth::user()->notifications()->whereNull('read_at')->count();
@endphp

@if ($unreadCount > 0)
    <span class="cl-notification-badge">
        {{ $unreadCount }} new
    </span>
@endif

                </div>

            </div>

            <!-- Account -->
            <div class="cl-account">

                <div class="cl-account-header">

                    <div class="cl-account-info">

                        <div class="cl-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <div>
                            <div class="cl-account-name">
                                {{ Auth::user()->name }}
                            </div>

                            <div class="cl-account-email">
                                {{ Auth::user()->email }}
                            </div>
                        </div>

                    </div>

                    <a
                        href="{{ route('profile.edit') }}"
                        class="cl-profile-button"
                    >
                        Edit Profile
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>