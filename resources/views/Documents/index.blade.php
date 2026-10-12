 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Documents
        </h2>
    </x-slot>

    <div style="max-width: 1100px; margin: 30px auto; padding: 20px;">
        @if (session('success'))
            <div style="background: #dcfce7; color: #166534; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div style="background: white; padding: 24px; border-radius: 12px; box-shadow: 0 2px 8px #00000010; margin-bottom: 25px;">
            <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 8px;">
                Upload a Document
            </h3>

            <p style="color: #64748b; margin-bottom: 18px;">
                Allowed formats: PDF, JPG, JPEG and PNG. Maximum size: 5 MB.
            </p>

            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input
                    type="file"
                    name="document"
                    accept=".pdf,.jpg,.jpeg,.png"
                    required
                    style="display: block; width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; margin-bottom: 16px;"
                >

                <button type="submit" style="background: #2563eb; color: white; padding: 11px 22px; border: none; border-radius: 8px; cursor: pointer; font-weight: 600;">
                    Upload Document
                </button>
            </form>
        </div>

        <div style="background: white; padding: 24px; border-radius: 12px; box-shadow: 0 2px 8px #00000010;">
            <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 18px;">
                My Uploaded Files
            </h3>

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="background: #f1f5f9;">
                            <th style="padding: 13px;">File Name</th>
                            <th style="padding: 13px;">Upload Date</th>
                            <th style="padding: 13px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($documents as $document)
                            <tr style="border-bottom: 1px solid #e2e8f0;">
                                <td style="padding: 13px;">
                                    {{ $document->original_name }}
                                </td>
                                <td style="padding: 13px;">
                                    {{ $document->created_at->format('d M Y, h:i A') }}
                                </td>
                                <td style="padding: 13px;">
                                    <a
                                        href="{{ route('documents.download', $document) }}"
                                        style="display: inline-block; background: #0f766e; color: white; padding: 8px 14px; border-radius: 6px; text-decoration: none;"
                                    >
                                        Download
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" style="padding: 22px; text-align: center; color: #64748b;">
                                    You haven't uploaded any documents yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>