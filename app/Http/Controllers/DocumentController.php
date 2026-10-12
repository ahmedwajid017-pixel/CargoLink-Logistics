<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentRequest;
use App\Models\Document;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = auth()->user()
            ->documents()
            ->latest()
            ->get();

        return view('Documents.index', compact('documents'));    }

    public function store(StoreDocumentRequest $request)
    {
        $file = $request->file('document');

        $path = $file->store('documents', 'public');

        auth()->user()->documents()->create([
            'original_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'mime_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
        ]);

        return redirect()
            ->route('documents.index')
            ->with('success', 'Document uploaded successfully.');
    }

    public function download(Document $document): StreamedResponse
    {
        abort_unless(
            $document->user_id === auth()->id(),
            403
        );

        abort_unless(
            Storage::disk('public')->exists($document->file_path),
            404
        );

        return Storage::disk('public')->download(
            $document->file_path,
            $document->original_name
        );
    }
}