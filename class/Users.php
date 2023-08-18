<?php

abstract class Users
{
    protected $scores = 0;
    protected $numberOfArticles = 0;

    public function setNumberOfArticles($numberOfArticles)
    {
        $this->numberOfArticles = $numberOfArticles;
    }

    public function getNumberOfArticles()
    {
        return $this->numberOfArticles;
    }

    abstract function calcScores();

}

class Author extends Users
{
    public function calcScores()
    {
        return $this->numberOfArticles *10 +20;
    }
}

class Editor extends Users
{
    public function calcScores()
    {
        return $this->numberOfArticles * 6 + 15;
    }
}

$author1 = new Author();
echo $author1->calcScores(8);

$editor1 = new Editor();
echo $editor1->calcScores(15);