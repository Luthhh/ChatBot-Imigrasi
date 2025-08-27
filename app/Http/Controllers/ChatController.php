<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    public function ask(Request $request)
    {
        $userInput = $request->input('message', '');

        if (empty($userInput)) {
            return response()->json(['error' => 'Pesan kosong'], 400);
        }

        $GEMINI_API_KEY = "AIzaSyC0Cgiik1VL5-BlRJzAyOLpsLdtQXSjCog";
        $GEMINI_URL = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent";

        // $instruction = "Anda adalah asisten virtual dari Kantor Imigrasi Indonesia. "
        //     . "Hanya jawab pertanyaan yang berkaitan dengan keimigrasian"
        //     . "Jika pertanyaan tidak berhubungan dengan imigrasi, tolong jawab: 'Maaf, saya hanya bisa membantu pertanyaan seputar imigrasi.'\n\n";
        $instruction = "Anda adalah Asisten Virtual resmi dari Kantor Imigrasi Indonesia. "
            . "Tugas Anda adalah memberikan jawaban informatif, akurat, dan sopan seputar layanan keimigrasian berdasarkan informasi dari situs resmi seperti https://kanimbogor.kemenkumham.go.id dan https://www.imigrasi.go.id. "
            . "Jika pertanyaan yang diajukan tidak berkaitan dengan topik keimigrasian, mohon jawab dengan: 'Maaf, saya hanya dapat membantu pertanyaan seputar keimigrasian.'\n\n";

        $fullPrompt = $instruction . "Pertanyaan: " . $userInput;

        $body = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $fullPrompt]
                    ]
                ]
            ]
        ];

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'X-goog-api-key' => $GEMINI_API_KEY
            ])->post($GEMINI_URL, $body);

            $data = $response->json();
            $candidates = $data['candidates'][0]['content']['parts'] ?? [];

            $aiReply = collect($candidates)->pluck('text')->implode('') ?: "Maaf, tidak ada respons dari AI.";

            return response()->json(['response' => $aiReply]);

        } catch (\Exception $e) {
            \Log::error("Error pada ChatController: " . $e->getMessage());

            return response()->json([
                'error' => 'Mohon maaf, ImmiBot tidak dapat bekerja saat ini. Silakan coba kembali nanti.'
            ], 500);
        }

    }
}
