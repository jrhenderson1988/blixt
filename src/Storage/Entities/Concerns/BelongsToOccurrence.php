<?php

namespace Blixt\Storage\Entities\Concerns;

use Blixt\Storage\Entities\Occurrence;

trait BelongsToOccurrence
{
    /**
     * @var int|null
     */
    protected $occurrenceId;

    /**
     * @return int|null
     */
    public function getOccurrenceId()
    {
        return $this->occurrenceId;
    }

    /**
     * @param int|null|mixed $occurrenceId
     */
    public function setOccurrenceId($occurrenceId)
    {
        $this->occurrenceId = $occurrenceId !== null
            ? ($occurrenceId instanceof Occurrence ? $occurrenceId->getId() : intval($occurrenceId))
            : null;
    }
}