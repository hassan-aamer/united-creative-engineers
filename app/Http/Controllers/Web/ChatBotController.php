<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\OpenAI\OpenAIService;
use App\Services\ChatBot\ChatBotService;

class ChatBotController extends Controller
{
    public function ask(Request $request, ChatBotService $ChatBot)
    {
        $question = $request->input('question');
        $answer = $ChatBot->ask($question);

        return response()->json(['answer' => $answer]);
    }
}
