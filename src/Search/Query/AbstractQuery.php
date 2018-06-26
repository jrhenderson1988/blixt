<?php

namespace Blixt\Search\Query;

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
    public function setStorage(Storage $storage): void
    {
        $this->storage = $storage;
    }

    /**
     * @param \Blixt\Tokenization\Tokenizer $tokenizer
     */
    public function setTokenizer(Tokenizer $tokenizer): void
    {
        $this->tokenizer = $tokenizer;
    }

    /**
     * @param \Blixt\Storage\Entities\Schema $schema
     */
    public function setSchema(Schema $schema): void
    {
        $this->schema = $schema;
    }
}