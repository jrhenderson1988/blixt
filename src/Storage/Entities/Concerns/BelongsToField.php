<?php

namespace Blixt\Storage\Entities\Concerns;

trait BelongsToField
{
    /**
     * @var int|null
     */
    protected $fieldId;

    /**
     * @return int|null
     */
    public function getFieldId()
    {
        return $this->fieldId;
    }

    /**
     * @param int|null|mixed $fieldId
     */
    public function setFieldId($fieldId)
    {
        $this->fieldId = $fieldId !== null ? intval($fieldId) : null;
    }

    /**
     * Fluent getter/setter for fieldId.
     *
     * @param int|null|mixed $fieldId
     *
     * @return $this|int|null
     */
    public function fieldId($fieldId = null)
    {
        if (func_num_args() === 0) {
            return $this->getFieldId();
        }

        $this->setFieldId($fieldId);

        return $this;
    }
}