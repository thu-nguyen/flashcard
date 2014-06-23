<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {

        $db = new \Phalcon\Db\Adapter\Pdo\Mysql ($this->config->database->toArray());
        $dbName = $this->config->database->dbname;
        $sql = sprintf("SELECT TABLE_NAME, TABLE_ROWS FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '%s'", $dbName);
        $result_set = $db->query($sql);
        $result_set->setFetchMode(Phalcon\Db::FETCH_ASSOC);
        $tables = $result_set->fetchAll($result_set);
        $this->view->setVar('tables', $tables);

    }

    public function  userAction($numberRows){
        $user = new User();
        $user->createData($numberRows);
        echo "Done";
    }

    public function flashcardAction($numberRows){
         $flashcard = new Flashcard();
         $flashcard->createData($numberRows);
         echo "Done";
    }

    public function userFlashcardAction($minRows, $maxRows){
        $userFlashcard = new UserFlashcardTerm();
        $userFlashcard->createData($minRows, $maxRows);
        echo "Done";
    }

    public function staticDataAction(){
        $accent = new FlashcardAccent();
        $accent->createData();
        $langs = new FlashcardLanguage();
        $langs->createData();
        $imageStyle = new FlashcardImageStyle();
        $imageStyle->createData();
    }

    public function clearAction(){
        $db = new \Phalcon\Db\Adapter\Pdo\Mysql ($this->config->database->toArray());
        $sql = "SET FOREIGN_KEY_CHECKS = 0;
                TRUNCATE TABLE user_flashcard_term;
                TRUNCATE TABLE user;
                TRUNCATE TABLE flashcard_image;
                TRUNCATE TABLE flashcard_sentence_sound;
                TRUNCATE TABLE flashcard_sentence;
                TRUNCATE TABLE flashcard_term_sound;
                TRUNCATE TABLE flashcard_term;
                TRUNCATE TABLE flashcard;";
        $db->query($sql);
        echo "Done";
    }

}

