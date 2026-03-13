<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Simple validation
        $validated = $request->validate([
            'form_type' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            // Rapido fields
            'message' => 'nullable|string',
            'services' => 'nullable|array',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:5120',
            // Asesoria fields
            'diag_web' => 'nullable|string',
            'diag_brand' => 'nullable|string',
            'diag_media' => 'nullable|string',
            'diag_startup' => 'nullable|string',
        ]);

        // Here we would typically send an email or save to DB
        // e.g. Mail::to('admin@trylab.studio')->send(new ContactMessage($validated));

        // Return a JSON response for the AJAX call
        return response()->json([
            'success' => true,
            'message' => 'Message received successfully.'
        ]);
    }
}
