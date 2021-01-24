<?php

namespace App\Tools;

use App\Repositories\Interfaces\CrawlerInterface;
use Goutte\Client;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CambridgeCrawl implements CrawlerInterface
{
    private $home = "https://dictionary.cambridge.org";

    private $urlGet = "https://dictionary.cambridge.org/dictionary/english/";

    private $word;

    private $generalNote;

    private $node;

    private $block;

    public $language_id;

    public $wordFound;

    public $dataCrawl = [];

    public function __construct($word, $language_id)
    {
        $word = Str::lower($word);
        $this->language_id = $language_id;
        $this->word = $word;
        $this->urlGet .= Str::slug($this->word, '-');
        $this->crawlData();
    }

    public function crawlData()
    {
        $client = new Client();
        $this->generalNote = $client->request('GET', $this->urlGet)->filter('.page > div .entry-body__el');
        $this->crawlWord();
    }

    public function crawlWord()
    {
        if (count($this->generalNote) == 0) return;
        $this->generalNote->each(function ($node, $index) {
            $this->wordFound = $node->filter('.di-title > span > span')->text();
            if ($this->wordFound != '') {
                $this->node = $node;
                $this->block = $index;
                $this->crawlAudio();

            }
        });


    }

    public function crawlAudio()
    {
        $this->node->filter('.us source')->each(function ($source, $index) {
            $this->copyAudio($source, $index, 'us');
        });
        $this->node->filter('.uk source')->each(function ($source, $index) {
            $this->copyAudio($source, $index, 'uk');
        });
        $this->crawlWordType();
        $this->crawlPronunciation();
        $this->crawlDescribe();
        $this->crawlExample();
    }

    public function crawlWordType() {
        $describeDiv = $this->node->filter('.posgram .dpos');
        if (count($describeDiv) > 0) $this->dataCrawl[$this->block]['word_type'] = $describeDiv->text();
    }

    public function copyAudio($source, $index, $type)
    {
        $audioLink = $source->attr('src');
        $audioType = $source->attr('type');
        if (!empty($audioLink)) {
            $tmp = explode('/', $audioLink);
            $fileName = end($tmp);
            $folder = str_replace($fileName, '', $audioLink);

            $tempAudio = storage_path('app/temp/' . time());
            if (!File::exists(storage_path('app/temp/'))) {
                File::makeDirectory(storage_path('app/temp/'), $mode = 0755, true, true);
            }
            copy($this->home . $source->attr('src'), $tempAudio);

            if (!File::exists(storage_path('app/public' . $folder))) {
                File::makeDirectory(storage_path('app/public' . $folder), $mode = 0755, true, true);
            }
            File::copy($tempAudio, storage_path('app/public' . $audioLink));
            unlink($tempAudio);
            $this->dataCrawl[$this->block]['audios'][$type][$index]['link'] = $audioLink;
            $this->dataCrawl[$this->block]['audios'][$type][$index]['type'] = $audioType;
        }
    }

    public function crawlPronunciation()
    {
        $spanIpaUk = $this->node->filter('.uk .ipa');
        $ipa = [];
        if(count($spanIpaUk) > 0) $ipa['uk'] = $spanIpaUk->html();
        $spanIpaUs = $this->node->filter('.us .ipa');
        if(count($spanIpaUs) > 0) $ipa['us'] = $spanIpaUs->html();
        if (count($spanIpaUs) > 0 || count($spanIpaUk) > 0)  $this->dataCrawl[$this->block]['ipas'] = $ipa;
    }

    public function crawlDescribe() {
        $describeDiv = $this->node->filter('.ddef_d');
        if (count($describeDiv) > 0) $this->dataCrawl[$this->block]['describe'] = $describeDiv->text();
    }

    public function crawlExample() {
        $this->node->filter('.examp .deg')->each(function ($spam, $index) {
            $this->dataCrawl[$this->block]['examples'][$index] = $spam->text();
        });
    }
}
