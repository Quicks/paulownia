<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Google\Cloud\Translate\TranslateClient;

class TranslateController extends Controller
{
    public function translate(Request $request)
    {
        $translate = new TranslateClient([
           'key' => env('GOOGLE_API_KEY')
        ]);

        $answer = [];
        foreach (config('translatable.locales') as $locale) {
            if($locale == 'es') {
                continue;
            }

            $results = $translate->translateBatch($request->texts, [
                'source' => 'es',
                'target' => $locale
            ]);

            $translatedTexts = [];
            foreach ($results as $result) {
                $translatedTexts[] = $result['text'];
            }
            $answer[$locale] = $translatedTexts;
        }
        return $answer;
    }
}
