<?php

namespace App\Tools;

use App\Models\Describe;
use App\Models\PronunciationAudio;
use App\Models\Pronunciation;
use App\Models\SentenceExample;
use Illuminate\Support\Str;
use App\Models\Word;
use App\Models\WordType;

class InsertWord
{
    public $cambridgeCrawl;

    public $found = true;

    /**
     * @var App\Models\Word
     */
    protected $modelWord;

    public function __construct(CambridgeCrawl $cambridgeCrawl)
    {
        $this->cambridgeCrawl = $cambridgeCrawl;
        $this->importToDatabase();
    }

    public function importToDatabase() {
        if(count($this->cambridgeCrawl->dataCrawl) == 0) {
            $this->found = false;
            return;
        }
        $this->insertWords();
        $this->insertDescribes();
        
    }

    public function insertWords() {
        $this->modelWord = Word::firstOrCreate([
            'language_id' => $this->cambridgeCrawl->language_id,
            'name' => $this->cambridgeCrawl->wordFound,
            'name_slug' => Str::slug($this->cambridgeCrawl->wordFound, '-')
        ]);
    }

    public function insertDescribes() {
        foreach($this->cambridgeCrawl->dataCrawl as $crawl) {
            $wordType = WordType::firstOrCreate([
                'name' => $crawl['word_type']
            ]);
            $describe = Describe::firstOrCreate([
                'word_id' => $this->modelWord->id,
                'word_type_id' => $wordType->id,
                'content' => $crawl['describe']
            ]);

            $this->insertIPA($crawl, $describe->id);
            $this->insertSentenceExamples($crawl, $describe->id);
        }
    }

    public function insertIPA($crawl, $describe_id) {
        if(empty($crawl['ipas']) || empty($crawl['ipas']['us']) || empty($crawl['ipas']['uk'])) {
            return;
        }
        $pronunciation = Pronunciation::firstOrCreate([
            'describe_id' => $describe_id,
            'us_ipa' => isset($crawl['ipas']['us']) ? $crawl['ipas']['us']: null,
            'uk_ipa' => isset($crawl['ipas']['uk']) ? $crawl['ipas']['uk']: null,
        ]);

        $this->insertAudios($crawl, $pronunciation->id);
        
    }

    public function insertAudios($crawl, $pronunciation_id) {
        if(empty($crawl['audios'])) {
            return;
        }

        foreach($crawl['audios'] as $countryAction => $audios) {
            foreach($audios as $audio) {
                PronunciationAudio::firstOrCreate([
                    'pronunciation_id' => $pronunciation_id,
                    'action_audio' => $countryAction,
                    'type_audio' => $audio['type'],
                    'url' => $audio['link']
                ]);
            }
        }
        

    }

    public function insertSentenceExamples($crawl, $describe_id) {
        if(empty($crawl['examples'])) {
            return;
        }
        foreach($crawl['examples'] as $example) {
            SentenceExample::firstOrCreate([
                'describe_id' => $describe_id,
                'content' => $example
            ]);
        }
        
    }
}
