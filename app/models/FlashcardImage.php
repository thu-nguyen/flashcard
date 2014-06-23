<?php




class FlashcardImage extends \Phalcon\Mvc\Model
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
    public $flashcard_id;
     
    /**
     *
     * @var integer
     */
    public $image_style_id;
     
    /**
     *
     * @var string
     */
    public $name;
     
    /**
     *
     * @var integer
     */
    public $created_by;
     
    /**
     *
     * @var string
     */
    public $date_created;
     
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
		$this->belongsTo("flashcard_id", "Flashcard", "id", NULL);
		$this->belongsTo("image_style_id", "FlashcardImageStyle", "id", NULL);

    }

}
