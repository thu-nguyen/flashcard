<?php
class FlashcardTerm extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;
     
    /**
     *
     * @var integer
     */
    public $language_id;
     
    /**
     *
     * @var integer
     */
    public $flashcard_id;
     
    /**
     *
     * @var string
     */
    public $term;
     
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
		$this->hasMany("id", "FlashcardSentence", "term_id", NULL);
		$this->hasMany("id", "FlashcardTermSound", "term_id", NULL);
		$this->hasMany("id", "UserFlashcardTerm", "flashcard_term_id", NULL);
		$this->belongsTo("language_id", "FlashcardLanguage", "id", NULL);
		$this->belongsTo("flashcard_id", "Flashcard", "id", NULL);

    }

    public function createData($flashcard_id, $language_id){
        // flashcard term
        $random  = new Random();
        $term = new FlashcardTerm();
        $term->language_id = $language_id;
        $term->flashcard_id = $flashcard_id;
        $term->term = $random->random_string(rand(5,8));
        $term->save();

        $termSound = new FlashcardTermSound();
        $termSound->accent_id = rand(1, FlashcardAccent::count());
        $termSound->term_id = $term->id;
        $termSound->duration = 0;
        $termSound->is_google_generated = rand(0,1);
        $termSound->save();

        $sentence = new FlashcardSentence();
        $sentence->term_id = $term->id;
        $sentence->sentence = $random->random_string(20);
        $sentence->save();

        $sentenceSound = new FlashcardSentenceSound();
        $sentenceSound->accent_id = rand(1, FlashcardAccent::count());
        $sentenceSound->sentence_id = $sentence->id;
        $sentenceSound->duration = 0;
        $sentenceSound->is_google_generated = rand(0,1);
        $sentenceSound->save();
    }

}
