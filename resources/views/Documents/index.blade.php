<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Documents
        </h2>
    </x-slot>

    <style>
        .cl-docs-page {
            min-height: calc(100vh - 65px);
            background: #f4f7fb;
            padding: 30px 16px 50px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .cl-docs-page *,
        .cl-docs-page *::before,
        .cl-docs-page *::after {
            box-sizing: border-box;
        }

        .cl-docs-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .cl-docs-alert {
            padding: 14px 16px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 15px;
        }

        .cl-docs-alert p {
            margin: 0;
        }

        .cl-docs-alert-success {
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
        }

        .cl-docs-alert-error {
            background: #fee2e2;
            border: 1px solid #fca5a5;
            color: #991b1b;
        }

        .cl-docs-card {
            margin-bottom: 25px;
            border-radius: 12px;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #dbe5f3;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.06);
        }

        .cl-docs-card-top {
            padding: 18px 24px;
            background: linear-gradient(135deg, #0f4c81, #087fba);
            color: #ffffff;
        }

        .cl-docs-card-top-green {
            background: linear-gradient(135deg, #0f766e, #14958a);
        }

        .cl-docs-card-top h3 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
        }

        .cl-docs-card-top p {
            margin: 4px 0 0;
            font-size: 15px;
            color: rgba(255, 255, 255, 0.9);
        }

        .cl-docs-card-body {
            padding: 24px;
            background: #f8fbff;
        }

        .cl-docs-file-input {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: #ffffff;
            color: #334155;
            font-size: 15px;
        }

        .cl-docs-file-input:focus {
            outline: none;
            border-color: #087fba;
            box-shadow: 0 0 0 3px rgba(8, 127, 186, 0.12);
        }

        .cl-docs-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .cl-docs-btn {
            min-height: 46px;
            padding: 0 24px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s ease, box-shadow 0.2s ease;
        }

        .cl-docs-btn:focus-visible {
            outline: 3px solid rgba(8, 127, 186, 0.35);
            outline-offset: 2px;
        }

        .cl-docs-btn-primary {
            border: none;
            background: #2563eb;
            color: #ffffff;
        }

        .cl-docs-btn-primary:hover {
            background: #1d4ed8;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }

        .cl-docs-btn-secondary {
            border: 1px solid #0f766e;
            background: #ffffff;
            color: #0f766e;
        }

        .cl-docs-btn-secondary:hover,
        .cl-docs-btn-secondary[aria-expanded="true"] {
            background: #0f766e;
            color: #ffffff;
        }

        .cl-docs-files-card[hidden] {
            display: none;
        }

        .cl-docs-table-wrap {
            overflow-x: auto;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background: #ffffff;
        }

        .cl-docs-table {
            width: 100%;
            min-width: 520px;
            border-collapse: collapse;
            text-align: left;
        }

        .cl-docs-table thead {
            background: #e6f0fb;
        }

        .cl-docs-table th {
            padding: 13px 14px;
            color: #243b63;
            font-size: 14px;
            font-weight: 700;
        }

        .cl-docs-table td {
            padding: 13px 14px;
            border-bottom: 1px solid #e2e8f0;
            color: #475569;
            font-size: 15px;
        }

        .cl-docs-table tbody tr:last-child td {
            border-bottom: none;
        }

        .cl-docs-table tbody tr:nth-child(even) {
            background: #f8fbff;
        }

        .cl-docs-table tbody tr:hover {
            background: #eef5ff;
        }

        .cl-docs-name {
            color: #172033;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .cl-docs-download {
            display: inline-block;
            padding: 9px 16px;
            border-radius: 6px;
            background: #0f766e;
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
        }

        .cl-docs-download:hover {
            background: #0b5f58;
        }

        .cl-docs-empty {
            padding: 28px 16px !important;
            text-align: center;
            color: #64748b !important;
        }

        @media (max-width: 600px) {
            .cl-docs-page {
                padding: 18px 10px 40px;
            }

            .cl-docs-card-top,
            .cl-docs-card-body {
                padding: 18px 16px;
            }

            .cl-docs-actions {
                flex-direction: column;
            }

            .cl-docs-btn {
                width: 100%;
            }
        }
    </style>

    <div class="cl-docs-page">
        <div class="cl-docs-container">

            @if (session('success'))
                <div class="cl-docs-alert cl-docs-alert-success" role="status">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="cl-docs-alert cl-docs-alert-error" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            {{-- Upload card --}}
            <div class="cl-docs-card">
                <div class="cl-docs-card-top">
                    <h3>Upload a Document</h3>
                    <p>Allowed formats: PDF, JPG, JPEG and PNG. Maximum size: 5 MB.</p>
                </div>

                <div class="cl-docs-card-body">
                    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input
                            type="file"
                            name="document"
                            accept=".pdf,.jpg,.jpeg,.png"
                            required
                            aria-label="Choose a document to upload"
                            class="cl-docs-file-input"
                        >

                        <div class="cl-docs-actions">
                            <button type="submit" class="cl-docs-btn cl-docs-btn-primary">
                                Upload Document
                            </button>

                            <button
                                type="button"
                                id="toggleDocuments"
                                class="cl-docs-btn cl-docs-btn-secondary"
                                aria-expanded="{{ session('success') ? 'true' : 'false' }}"
                                aria-controls="documentsList"
                            >
                                <span id="toggleDocumentsLabel">
                                    {{ session('success') ? 'Hide Documents' : 'View Documents' }}
                                </span>
                                ({{ $documents->count() }})
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Documents list card (shown when View Documents is clicked) --}}
            <div
                class="cl-docs-card cl-docs-files-card"
                id="documentsList"
                @unless (session('success')) hidden @endunless
            >
                <div class="cl-docs-card-top cl-docs-card-top-green">
                    <h3>My Uploaded Files</h3>
                </div>

                <div class="cl-docs-card-body">
                    <div class="cl-docs-table-wrap">
                        <table class="cl-docs-table">
                            <thead>
                                <tr>
                                    <th>File Name</th>
                                    <th>Upload Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($documents as $document)
                                    <tr>
                                        <td>
                                            <span class="cl-docs-name">{{ $document->original_name }}</span>
                                        </td>
                                        <td>
                                            {{ $document->created_at->format('d M Y, h:i A') }}
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('documents.download', $document) }}"
                                                class="cl-docs-download"
                                            >
                                                Download
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="cl-docs-empty">
                                            You haven't uploaded any documents yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        (function () {
            var button = document.getElementById('toggleDocuments');
            var label = document.getElementById('toggleDocumentsLabel');
            var list = document.getElementById('documentsList');

            if (!button || !list) {
                return;
            }

            button.addEventListener('click', function () {
                var isHidden = list.hasAttribute('hidden');

                if (isHidden) {
                    list.removeAttribute('hidden');
                    label.textContent = 'Hide Documents';
                    button.setAttribute('aria-expanded', 'true');
                    list.scrollIntoView({ behavior: 'smooth', block: 'start' });
                } else {
                    list.setAttribute('hidden', '');
                    label.textContent = 'View Documents';
                    button.setAttribute('aria-expanded', 'false');
                }
            });
        })();
    </script>
</x-app-layout>