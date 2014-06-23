<?php




class FlashcardImageStyle extends \Phalcon\Mvc\Model
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
    public $name;
     
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
		$this->hasMany("id", "FlashcardImage", "image_style_id", NULL);

    }

    public function createData(){
        $styles = array("Cartoon", "Real");
        
            foreach($styles as $item){
                $imageStyle = new FlashcardImageStyle();
                $imageStyle->name = $item;
                $imageStyle->is_disabled = 0;
                $imageStyle->save();
            }
        
    }

}
