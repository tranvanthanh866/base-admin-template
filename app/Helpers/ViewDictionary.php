<?php
namespace App\Helpers;

use Illuminate\Support\Facades\View;

class ViewDictionary
{
    public $word;

    public function __construct($word)
    {
        $this->word = $word;
    }

    public function renderView() {
        return view('parts.word', ['word' => $this->word])->render();
    }


}