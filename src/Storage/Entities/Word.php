<?php

namespace Blixt\Storage\Entities;

class Word extends Entity
{
    /**
     * @var string
     */
    protected $word;

    /**
     * Word constructor.
     *
     * @param $id
     * @param $word
     */
    public function __construct($id, $word)
    {
        parent::__construct($id);

        $this->setWord($word);
    }

    /**
     * @return string
     */
    public function getWord()
    {
        return $this->word;
    }

    /**
     * @param string|mixed $word
     */
    public function setWord($word)
    {
        $this->word = strval($word);
    }
}