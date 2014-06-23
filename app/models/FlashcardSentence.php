<?php




class FlashcardSentence extends \Phalcon\Mvc\Model
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
    public $term_id;
     
    /**
     *
     * @var string
     */
    public $sentence;
     
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
		$this->hasMany("id", "FlashcardSentenceSound", "sentence_id", NULL);
		$this->belongsTo("term_id", "FlashcardTerm", "id", NULL);

    }

}
