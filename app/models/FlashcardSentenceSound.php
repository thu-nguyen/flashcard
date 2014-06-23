<?php




class FlashcardSentenceSound extends \Phalcon\Mvc\Model
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
    public $accent_id;
     
    /**
     *
     * @var integer
     */
    public $sentence_id;
     
    /**
     *
     * @var string
     */
    public $duration;
     
    /**
     *
     * @var string
     */
    public $is_google_generated;
     
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
		$this->belongsTo("accent_id", "FlashcardAccent", "id", NULL);
		$this->belongsTo("sentence_id", "FlashcardSentence", "id", NULL);

    }

}
