<?php
class Flashcard extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;
     
    /**
     *
     * @var string
     */
    public $is_approved;
     
    /**
     *
     * @var string
     */
    public $is_disabled;
     
    /**
     *
     * @var integer
     */
    public $updated_by;
     
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
     *
     * @var string
     */
    public $date_updated;
     
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
		$this->hasMany("id", "FlashcardImage", "flashcard_id", NULL);
		$this->hasMany("id", "FlashcardTerm", "flashcard_id", NULL);

    }

    public function createData($numberOfRows){
        
        $random = new Random();
        for($i = 1; $i <= $numberOfRows; $i++){
            $flashcard = new Flashcard();
            $flashcard->is_approved = 0;
            $flashcard->is_disabled = 0;
            $flashcard->created_by = 1;
            $flashcard->date_created = $random->random_created_date();
            $flashcard->save();

            $term = new FlashcardTerm();
            $term->createData($flashcard->id, 1);
            $term->createData($flashcard->id, rand(2,3));

            $image = new FlashcardImage();
            $image->flashcard_id = $flashcard->id;
            $image->image_style_id = rand(1, FlashcardImageStyle::count());
            $image->name = $random->random_string(4);
            $image->created_by = 1;
            $image->date_created = $flashcard->date_created;
            $image->save();
        }
        echo "Number of Flashcard: " . Flashcard::count();

    }

}
