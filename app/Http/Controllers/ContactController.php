<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'form_type' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string',
            'services' => 'nullable|array',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:5120',
            'diag_web' => 'nullable|string',
            'diag_brand' => 'nullable|string',
            'diag_media' => 'nullable|string',
            'diag_startup' => 'nullable|string',
        ]);

        $message = new \App\Models\ContactMessage();
        $message->form_type = $validated['form_type'];
        $message->name = $validated['name'];
        $message->email = $validated['email'];
        $message->phone = $validated['phone'] ?? null;
        $message->message = $validated['message'] ?? null;
        $message->services = $validated['services'] ?? null;
        $message->diag_web = $validated['diag_web'] ?? null;
        $message->diag_brand = $validated['diag_brand'] ?? null;
        $message->diag_media = $validated['diag_media'] ?? null;
        $message->diag_startup = $validated['diag_startup'] ?? null;

        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('attachments', 'public');
            $message->attachment_path = $path;
        }

        $message->save();

        return response()->json([
            'success' => true,
            'message' => 'Message received successfully.'
        ]);
    }
}
