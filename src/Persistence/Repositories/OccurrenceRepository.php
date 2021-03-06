<?php

namespace Blixt\Persistence\Repositories;

use Blixt\Persistence\Entities\Entity;
use Blixt\Persistence\Entities\Occurrence;
use Blixt\Persistence\Entities\Term;
use Illuminate\Support\Collection;

/**
 * OccurrenceRepository.
 *
 * @method Collection get(array $ids)
 * @method Collection getWhere(array $conditions, int $offset = 0, int $limit = null)
 * @method Collection all(int $offset = 0, int $limit = null)
 * @method Occurrence|null findBy(array $conditions)
 * @method Occurrence|null find(int $id)
 * @method Occurrence create(Occurrence $entity)
 * @method Occurrence update(Occurrence $entity)
 * @method Occurrence save(Occurrence $entity)
 *
 * @package Blixt\Persistence\Repositories
 */
class OccurrenceRepository extends AbstractRepository
{
    public const TABLE = 'occurrences';
    public const FIELD_ID = 'field_id';
    public const TERM_ID = 'term_id';
    public const FREQUENCY = 'frequency';

    /**
     * Get the attributes from the given entity.
     *
     * @param \Blixt\Persistence\Entities\Occurrence|\Blixt\Persistence\Entities\Entity $entity
     *
     * @return array
     */
    public static function toAttributes(Entity $entity): array
    {
        return [
            static::FIELD_ID => $entity->getFieldId(),
            static::TERM_ID => $entity->getTermId(),
            static::FREQUENCY => $entity->getFrequency()
        ];
    }

    /**
     * Create a relevant entity from the given ID and set of attributes.
     *
     * @param int $id
     * @param array $attributes
     *
     * @return \Blixt\Persistence\Entities\Occurrence|\Blixt\Persistence\Entities\Entity
     */
    public static function toEntity(int $id, array $attributes): Entity
    {
        return Occurrence::make(
            $id,
            $attributes[static::FIELD_ID],
            $attributes[static::TERM_ID],
            $attributes[static::FREQUENCY]
        );
    }

    /**
     * Get a collection of Occurrences by the given set of terms.
     *
     * @param Collection $terms
     *
     * @return Collection
     */
    public function getByTerms(Collection $terms): Collection
    {
        return $this->getWhere([
            static::TERM_ID => $terms->map(function (Term $term) {
                return $term->getId();
            })->all()
        ]);
    }
}
