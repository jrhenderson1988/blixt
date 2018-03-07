<?php

namespace Blixt\Index\Search;

use Blixt\Stemming\Stemmer;
use Blixt\Storage\Entities\Schema;
use Blixt\Storage\Storage;
use Blixt\Tokenization\Tokenizer;

abstract class AbstractQuery
{
    /**
     * @var \Blixt\Storage\Storage
     */
    protected $storage;

    /**
     * @var \Blixt\Stemming\Stemmer
     */
    protected $stemmer;

    /**
     * @var \Blixt\Tokenization\Tokenizer
     */
    protected $tokenizer;

    /**
     * @var \Blixt\Storage\Entities\Schema
     */
    protected $schema;

    /**
     * @param \Blixt\Storage\Storage $storage
     */
    public function setStorage(Storage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param \Blixt\Stemming\Stemmer $stemmer
     */
    public function setStemmer(Stemmer $stemmer)
    {
        $this->stemmer = $stemmer;
    }

    /**
     * @param \Blixt\Tokenization\Tokenizer $tokenizer
     */
    public function setTokenizer(Tokenizer $tokenizer)
    {
        $this->tokenizer = $tokenizer;
    }

    /**
     * @param \Blixt\Storage\Entities\Schema $schema
     */
    public function setSchema(Schema $schema)
    {
        $this->schema = $schema;
    }
}