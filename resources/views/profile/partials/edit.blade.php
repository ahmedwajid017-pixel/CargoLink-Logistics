<x-app-layout>
    {{-- Header slot (shown in the Breeze header bar) --}}
    <x-slot name="header">
        <div class="flex items-center gap-2 text-sm font-medium text-slate-500">
            <span>Account</span>
            <svg class="h-4 w-4 text-slate-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            </svg>
            <span class="text-slate-900">Profile</span>
        </div>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

            {{-- ============ PAGE HEADING ============ --}}
            <div class="mb-8">
                <h1 class="text-3xl font-bold tracking-tight text-slate-900">My Profile</h1>
                <p class="mt-2 text-base text-slate-500">
                    Manage your CargoLink account information and keep your contact details up to date.
                </p>
            </div>

            {{-- ============ SUCCESS MESSAGE ============ --}}
            @if (session('status') === 'profile-updated')
                <div role="status" class="mb-6 flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 p-4">
                    <svg class="mt-0.5 h-6 w-6 flex-shrink-0 text-green-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="9" />
                        <path d="M8.5 12.5l2.5 2.5 4.5-5" />
                    </svg>
                    <div>
                        <p class="text-base font-semibold text-green-800">Profile updated successfully</p>
                        <p class="mt-0.5 text-sm text-green-700">Your account information has been saved.</p>
                    </div>
                </div>
            @endif

            {{-- ============ ERROR SUMMARY ============ --}}
            @if ($errors->any())
                <div role="alert" class="mb-6 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 p-4">
                    <svg class="mt-0.5 h-6 w-6 flex-shrink-0 text-red-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="9" />
                        <path d="M12 8v5M12 16.5h.01" />
                    </svg>
                    <div>
                        <p class="text-base font-semibold text-red-800">We couldn't save your changes</p>
                        <p class="mt-0.5 text-sm text-red-700">Please review the highlighted fields below and try again.</p>
                    </div>
                </div>
            @endif

            {{-- ============ PROFILE CARD ============ --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                {{-- Profile / avatar header --}}
                <div class="flex flex-col items-center gap-4 border-b border-slate-200 bg-slate-50 p-6 text-center sm:flex-row sm:gap-6 sm:p-8 sm:text-left">
                    <div class="flex h-20 w-20 flex-shrink-0 items-center justify-center rounded-full bg-slate-900 text-3xl font-semibold text-white ring-4 ring-white shadow-sm" aria-hidden="true">
                        {{ mb_strtoupper(mb_substr($user->name, 0, 1)) }}
                    </div>

                    <div class="min-w-0">
                        <h2 class="truncate text-xl font-semibold text-slate-900">{{ $user->name }}</h2>
                        <p class="mt-1 truncate text-base text-slate-500">{{ $user->email }}</p>
                        <span class="mt-3 inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1 text-sm font-medium text-blue-700 ring-1 ring-inset ring-blue-200">
                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0L3.3 9.7a1 1 0 011.4-1.4l3.8 3.8 6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd" />
                            </svg>
                            CargoLink Member
                        </span>
                    </div>
                </div>

                {{-- ============ FORM ============ --}}
                <div class="p-6 sm:p-8">

                    {{-- Section heading --}}
                    <div class="mb-6 flex items-start gap-3">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-700">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 3l7 3v5c0 4.5-3 8.2-7 10-4-1.8-7-5.5-7-10V6l7-3z" />
                                <path d="M9 12l2 2 4-4" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">Account Information</h2>
                            <p class="mt-0.5 text-sm text-slate-500">Update your personal details used across your CargoLink portal.</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        {{-- Full Name --}}
                        <div>
                            <label for="name" class="block text-sm font-semibold text-slate-700">Full Name</label>
                            <div class="relative mt-2">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <circle cx="12" cy="8" r="4" />
                                        <path d="M4 21c0-4 3.6-7 8-7s8 3 8 7" />
                                    </svg>
                                </div>
                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    value="{{ old('name', $user->name) }}"
                                    placeholder="John Doe"
                                    required
                                    autocomplete="name"
                                    @error('name') aria-invalid="true" aria-describedby="name-error" @enderror
                                    class="block h-12 w-full rounded-lg border bg-white pl-11 pr-4 text-base text-slate-900 placeholder:text-slate-400 transition focus:outline-none focus:ring-4 @error('name') border-red-400 focus:border-red-500 focus:ring-red-500/20 @else border-slate-300 focus:border-blue-600 focus:ring-blue-600/20 @enderror"
                                >
                            </div>
                            @error('name')
                                <p id="name-error" class="mt-2 flex items-center gap-1.5 text-sm font-medium text-red-600">
                                    <svg class="h-4 w-4 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9 6a1 1 0 112 0v4a1 1 0 11-2 0V6zm1 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Email Address --}}
                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700">Email Address</label>
                            <div class="relative mt-2">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <rect x="3" y="5" width="18" height="14" rx="2" />
                                        <path d="M3 7l9 6 9-6" />
                                    </svg>
                                </div>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email', $user->email) }}"
                                    placeholder="john@example.com"
                                    required
                                    autocomplete="email"
                                    @error('email') aria-invalid="true" aria-describedby="email-error" @else aria-describedby="email-help" @enderror
                                    class="block h-12 w-full rounded-lg border bg-white pl-11 pr-4 text-base text-slate-900 placeholder:text-slate-400 transition focus:outline-none focus:ring-4 @error('email') border-red-400 focus:border-red-500 focus:ring-red-500/20 @else border-slate-300 focus:border-blue-600 focus:ring-blue-600/20 @enderror"
                                >
                            </div>
                            @error('email')
                                <p id="email-error" class="mt-2 flex items-center gap-1.5 text-sm font-medium text-red-600">
                                    <svg class="h-4 w-4 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9 6a1 1 0 112 0v4a1 1 0 11-2 0V6zm1 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @else
                                <p id="email-help" class="mt-2 text-sm text-slate-500">We'll use this address for shipment notifications and account updates.</p>
                            @enderror
                        </div>

                        {{-- Phone Number --}}
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-slate-700">Phone Number</label>
                            <div class="relative mt-2">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M5 4h4l2 5-2.5 1.5a11 11 0 005 5L15 13l5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z" />
                                    </svg>
                                </div>
                                <input
                                    id="phone"
                                    name="phone"
                                    type="tel"
                                    value="{{ old('phone', $user->phone) }}"
                                    placeholder="+92 300 1234567"
                                    autocomplete="tel"
                                    @error('phone') aria-invalid="true" aria-describedby="phone-error" @enderror
                                    class="block h-12 w-full rounded-lg border bg-white pl-11 pr-4 text-base text-slate-900 placeholder:text-slate-400 transition focus:outline-none focus:ring-4 @error('phone') border-red-400 focus:border-red-500 focus:ring-red-500/20 @else border-slate-300 focus:border-blue-600 focus:ring-blue-600/20 @enderror"
                                >
                            </div>
                            @error('phone')
                                <p id="phone-error" class="mt-2 flex items-center gap-1.5 text-sm font-medium text-red-600">
                                    <svg class="h-4 w-4 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9 6a1 1 0 112 0v4a1 1 0 11-2 0V6zm1 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Actions --}}
                        <div class="flex flex-col-reverse items-stretch gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:items-center sm:justify-end">
                            <button
                                type="submit"
                                class="inline-flex h-12 w-full items-center justify-center gap-2 rounded-lg bg-blue-700 px-6 text-base font-semibold text-white shadow-sm transition duration-150 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-600/30 sm:w-auto"
                            >
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M5 12.5l4.5 4.5L19 7.5" />
                                </svg>
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>