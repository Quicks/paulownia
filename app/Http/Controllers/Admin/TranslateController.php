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
           'key' => 'AIzaSyBka8NI0ipWHV-_rKotvoXQmen-6q-pvcg'
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
