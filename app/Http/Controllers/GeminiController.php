<?php

namespace App\Http\Controllers;

use App\Http\Services\Gemini\GeminiContentGenerator;
use Illuminate\Http\Request;
use JsonException;
use Parsedown;

class GeminiController extends Controller
{
    public function index()
    {
        return view('gemini.promts');
    }

    /**
     * @throws JsonException
     */
    public function generateContent(Request $request, GeminiContentGenerator $geminiContentGenerator)
    {
        if(!$request->isMethod('post')) {
            return redirect()->route('gm-promts');
        }

        $name = $request->get('name');
        $prompt = $request->get('prompt');

        $parts = [
            'text' => $prompt
        ];

        $contents = [
            'parts' => [
                $parts
            ]
        ];

        $data = [
            'contents' => [$contents]
        ];


        $content = $geminiContentGenerator->generateContent($data);
        $result = $content->json();
        $result = $result['candidates'][0]['content']['parts'][0]['text'];

        $parsedown = new Parsedown();

        $clearedResult = $parsedown->text($result);

        return view('gemini.promts', compact('clearedResult', 'name', 'prompt'));
    }
}
