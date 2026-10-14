
<x-app-layout>
    <style>
        .cl-notifications-page {
            min-height: calc(100vh - 65px);
            background: #f4f7fb;
            padding: 35px 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .cl-notifications-container {
            max-width: 950px;
            margin: auto;
        }

        .cl-notifications-header {
            background: linear-gradient(135deg, #0f4c81, #087fba);
            color: white;
            padding: 28px 32px;
            border-radius: 16px;
            margin-bottom: 25px;
        }

        .cl-notifications-header h1 {
            font-size: 28px;
            font-weight: 800;
            margin: 0 0 8px;
        }

        .cl-notifications-header p {
            margin: 0;
            font-size: 14px;
            opacity: 0.9;
        }

        .cl-notifications-count {
            display: inline-block;
            margin-top: 16px;
            padding: 6px 12px;
            border-radius: 20px;
            background: white;
            color: #087fba;
            font-size: 13px;
            font-weight: 700;
        }

        .cl-notification-list {
            display: grid;
            gap: 14px;
        }

        .cl-notification {
            display: block;
            padding: 22px 24px;
            background: white;
            border: 1px solid #e2e8f0;
            border-left: 4px solid #087fba;
            border-radius: 12px;
            text-decoration: none;
            color: #172033;
            transition: 0.2s ease;
        }

        .cl-notification:hover {
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.07);
        }

        .cl-notification.is-read {
            background: #f1f3f5;
            border-left-color: #cbd5e1;
            color: #64748b;
        }

        .cl-notification-message {
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 12px;
        }

        .cl-notification-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            font-size: 12px;
            color: #64748b;
        }

        .cl-notification-status {
            font-weight: 700;
        }

        .cl-notification-status.unread {
            color: #087fba;
        }

        .cl-notification-status.read {
            color: #64748b;
        }

        .cl-notification-empty {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 40px 20px;
            text-align: center;
            color: #64748b;
        }

        .cl-back-link {
            display: inline-block;
            margin-bottom: 18px;
            color: #087fba;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none;
        }

        .cl-back-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .cl-notifications-page {
                padding: 22px 14px;
            }

            .cl-notifications-header {
                padding: 24px 20px;
            }

            .cl-notifications-header h1 {
                font-size: 24px;
            }

            .cl-notification {
                padding: 18px;
            }
        }
    </style>

    <div class="cl-notifications-page">
        <div class="cl-notifications-container">

            <a href="{{ route('dashboard') }}" class="cl-back-link">
                Back to Dashboard
            </a>

            <div class="cl-notifications-header">
                <h1>Notifications</h1>
                <p>Stay informed about your CargoLink account and shipping updates.</p>

                <span class="cl-notifications-count">
                    {{ $notifications->whereNull('read_at')->count() }} unread
                </span>
            </div>

            <div class="cl-notification-list">
                @forelse ($notifications as $notification)
                    <a
                        href="{{ $notification->read_at
                            ? route('notifications.index')
                            : route('notifications.read', $notification) }}"
                        @if (!$notification->read_at)
                            onclick="event.preventDefault(); document.getElementById('read-notification-{{ $notification->id }}').submit();"
                        @endif
                        class="cl-notification {{ $notification->read_at ? 'is-read' : '' }}"
                    >
                        <div class="cl-notification-message">
                            {{ $notification->message }}
                        </div>

                        <div class="cl-notification-footer">
                            <span>
                                {{ $notification->created_at->format('M d, Y \a\t h:i A') }}
                            </span>

                            <span class="cl-notification-status {{ $notification->read_at ? 'read' : 'unread' }}">
                                {{ $notification->read_at ? 'Read' : 'Unread · Click to mark as read' }}
                            </span>
                        </div>
                    </a>

                    @if (!$notification->read_at)
                        <form
                            id="read-notification-{{ $notification->id }}"
                            action="{{ route('notifications.read', $notification) }}"
                            method="POST"
                            style="display: none;"
                        >
                            @csrf
                            @method('PATCH')
                        </form>
                    @endif
                @empty
                    <div class="cl-notification-empty">
                        <h3 style="font-weight: 700; margin-bottom: 8px;">
                            You're all caught up
                        </h3>
                        <p>You don't have any notifications yet.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
