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
           'keyFile' => json_decode(file_get_contents(base_path(env('GOOGLE_APPLICATION_CREDENTIALS'))), true)
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
