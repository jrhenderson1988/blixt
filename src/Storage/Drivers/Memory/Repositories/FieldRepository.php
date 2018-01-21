<?php

namespace Blixt\Storage\Drivers\Memory\Repositories;

use Blixt\Storage\Entities\Field;
use Blixt\Storage\Repositories\FieldRepository as FieldRepositoryInterface;

class FieldRepository extends AbstractRepository implements FieldRepositoryInterface
{
    const TABLE = 'fields';
    const FIELD_DOCUMENT_ID = 'document_id';
    const FIELD_COLUMN_ID = 'column_id';
    const FIELD_VALUE = 'value';

    /**
     * Map an array, representing an entity into a relevant Entity object.
     *
     * @param array $row
     *
     * @return \Blixt\Storage\Entities\Field
     */
    protected function map(array $row)
    {
        return new Field(
            $row[static::FIELD_ID],
            $row[static::FIELD_DOCUMENT_ID],
            $row[static::FIELD_COLUMN_ID],
            $row[static::FIELD_VALUE]
        );
    }
}