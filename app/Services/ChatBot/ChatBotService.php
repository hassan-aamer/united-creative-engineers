<?php

namespace App\Services\ChatBot;

use App\Models\Faq;

class ChatBotService
{
    public function ask(string $question): string
    {
        $locale = app()->getLocale();

        $faq = Faq::whereRaw("JSON_UNQUOTE(JSON_EXTRACT(question, '$.{$locale}')) LIKE ?", ["%{$question}%"])
            ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(answer, '$.{$locale}')) LIKE ?", ["%{$question}%"])
            ->first();

        if ($faq) {
            return $faq->getTranslation('answer', $locale);
        }

        return __('attributes.messageBot');
    }
}
