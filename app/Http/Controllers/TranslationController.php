<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TranslationService;

class TranslationController extends Controller
{
    public function index(TranslationService $translationService)
    {
        $text = "Hello World"; // النص الذي تريد ترجمته
        $translatedText = $translationService->translate($text, 'ar'); // ترجمة النص إلى العربية

        return view('welcome', ['translatedText' => $translatedText]);
    }
}

