<?php

namespace App\Http\Controllers;

use App\Helpers\ViewDictionary;
use App\Models\Language;
use App\Models\Word;
use App\Tools\CambridgeCrawl;
use App\Tools\InsertWord;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index(Request $request) {
        $params = $request->all();
        if(!empty($params['q'])) {
            if($this->crawl($params['q'])) {
                return redirect()->route('word.show',['slugWord' => Str::slug($params['q'], '-')]);
            }
            
        }
        return view('index');
    }

    public function crawl($word) {
        $language = Language::where('country_code', 'en')->first();
        $modelWord = Word::where('name', $word)->first();
        if($modelWord) {
            return true;
        }
        $insertWord = new InsertWord(new CambridgeCrawl($word, $language->id));
        return $insertWord->found;
    }

    public function show($slugWord) {
        $word = Word::where('name_slug', $slugWord)->first();
        if($word == null) {
            abort(404);
        }
        $viewWord = new ViewDictionary($word);
        return view('index', [
            'word' => $word,
            'viewWord' => $viewWord
        ]);
    }
}
