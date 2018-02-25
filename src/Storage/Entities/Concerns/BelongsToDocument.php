<?php

namespace Blixt\Storage\Entities\Concerns;

use Blixt\Storage\Entities\Document;

trait BelongsToDocument
{
    /**
     * @var int|null
     */
    protected $documentId;

    /**
     * @return int|null
     */
    public function getDocumentId()
    {
        return $this->documentId;
    }

    /**
     * @param int|null|mixed $documentId
     */
    public function setDocumentId($documentId)
    {
        $this->documentId = $documentId !== null
            ? ($documentId instanceof Document ? $documentId->getId() : intval($documentId))
            : null;
    }

    /**
     * Fluent getter/setter for documentId.
     *
     * @param null $documentId
     *
     * @return $this|int|null
     */
    public function documentId($documentId = null)
    {
        if (func_num_args() === 0) {
            return $this->getDocumentId();
        }

        $this->setDocumentId($documentId);

        return $this;
    }
}