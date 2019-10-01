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

        $result = $translate->translate($request->text, [
                'source' => 'ru',
                'target' => 'en'
        ]);
        
        return $result['text'];
    }
}
