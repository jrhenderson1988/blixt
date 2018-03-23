<?php

namespace Blixt\Storage\Entities;

use Blixt\Storage\Entities\Concerns\BelongsToSchema;

class Document extends Entity
{
    use BelongsToSchema;

    /**
     * @var null|mixed
     */
    protected $key;

    /**
     * Document constructor.
     *
     * @param int|null|mixed $id
     * @param int|null|mixed $schemaId
     * @param null|mixed     $key
     */
    public function __construct($id = null, $schemaId = null, $key = null)
    {
        parent::__construct($id);

        $this->setSchemaId($schemaId);
        $this->setKey($key);
    }

    /**
     * @return null|mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param null|mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }
}