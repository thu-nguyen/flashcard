<?php




class FlashcardAccent extends \Phalcon\Mvc\Model
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
    public $accent;
     
    /**
     *
     * @var string
     */
    public $is_disabled;
     
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
		$this->hasMany("id", "FlashcardSentenceSound", "accent_id", NULL);
		$this->hasMany("id", "FlashcardTermSound", "accent_id", NULL);

    }

    public function createData(){
        $accents = array("Male", "Female", "Cartoon", "Robot");
        foreach($accents as $item){
            $accent = new FlashcardAccent();
            $accent->accent = $item;
            $accent->is_disabled = 0;
            if ($accent->save()){
                print_r($accent->getMessages());
            }

        }

    }

}
