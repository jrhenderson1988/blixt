<?php

namespace Blixt\Persistence;

use Blixt\Persistence\Drivers\Driver;
use Blixt\Persistence\Entities\Column;
use Blixt\Persistence\Entities\Document;
use Blixt\Persistence\Entities\Field;
use Blixt\Persistence\Entities\Occurrence;
use Blixt\Persistence\Entities\Position;
use Blixt\Persistence\Entities\Schema;
use Blixt\Persistence\Entities\Term;
use Blixt\Persistence\Entities\Word;
use Blixt\Persistence\Repositories\ColumnRepository;
use Blixt\Persistence\Repositories\DocumentRepository;
use Blixt\Persistence\Repositories\FieldRepository;
use Blixt\Persistence\Repositories\OccurrenceRepository;
use Blixt\Persistence\Repositories\PositionRepository;
use Blixt\Persistence\Repositories\Repository;
use Blixt\Persistence\Repositories\SchemaRepository;
use Blixt\Persistence\Repositories\TermRepository;
use Blixt\Persistence\Repositories\WordRepository;
use InvalidArgumentException;

class Storage
{
    /**
     * @var \Blixt\Persistence\Drivers\Driver
     */
    protected $driver;

    /**
     * @var array
     */
    protected $repositories = [];

    /**
     * Map each entity to its corresponding repository.
     *
     * @var array
     */
    protected $repositoryMappings = [
        Column::class => ColumnRepository::class,
        Document::class => DocumentRepository::class,
        Field::class => FieldRepository::class,
        Occurrence::class => OccurrenceRepository::class,
        Position::class => PositionRepository::class,
        Schema::class => SchemaRepository::class,
        Term::class => TermRepository::class,
        Word::class => WordRepository::class
    ];

    /**
     * StorageFactory constructor.
     *
     * @param \Blixt\Persistence\Drivers\Driver $driver
     */
    public function __construct(Driver $driver)
    {
        $this->driver = $driver;
    }

    /**
     * Get or create a repository for the provided class name.
     *
     * @param string $class
     *
     * @return \Blixt\Persistence\Repositories\Repository
     */
    public function repository(string $class): Repository
    {
        if (isset($this->repositories[$class = $this->getEntityClassName($class)])) {
            return $this->repositories[$class];
        }

        return $this->repositories[$class] = $this->makeRepository($class);
    }

    /**
     * Get the column repository.
     *
     * @return \Blixt\Persistence\Repositories\ColumnRepository
     */
    public function columns(): ColumnRepository
    {
        return $this->repository(Column::class);
    }

    /**
     * Get the document repository.
     *
     * @return \Blixt\Persistence\Repositories\DocumentRepository
     */
    public function documents(): DocumentRepository
    {
        return $this->repository(Document::class);
    }

    /**
     * Get the field repository.
     *
     * @return \Blixt\Persistence\Repositories\FieldRepository
     */
    public function fields(): FieldRepository
    {
        return $this->repository(Field::class);
    }

    /**
     * Get the occurrence repository.
     *
     * @return \Blixt\Persistence\Repositories\OccurrenceRepository
     */
    public function occurrences(): OccurrenceRepository
    {
        return $this->repository(Occurrence::class);
    }

    /**
     * Get the position repository.
     *
     * @return \Blixt\Persistence\Repositories\PositionRepository
     */
    public function positions(): PositionRepository
    {
        return $this->repository(Position::class);
    }

    /**
     * Get the schema repository.
     *
     * @return \Blixt\Persistence\Repositories\SchemaRepository
     */
    public function schemas(): SchemaRepository
    {
        return $this->repository(Schema::class);
    }

    /**
     * Get the term repository.
     *
     * @return \Blixt\Persistence\Repositories\TermRepository
     */
    public function terms(): TermRepository
    {
        return $this->repository(Term::class);
    }

    /**
     * Get the word repository.
     *
     * @return \Blixt\Persistence\Repositories\WordRepository
     */
    public function words(): WordRepository
    {
        return $this->repository(Word::class);
    }

    /**
     * Given a string representing the class name of either an entity or a repository, return the corresponding entity
     * class name as defined in the $repositoryMappings property.
     *
     * @param string $class
     *
     * @return string
     */
    protected function getEntityClassName(string $class): string
    {
        if (isset($this->repositoryMappings[$class])) {
            return $class;
        } elseif (($key = array_search($class, $this->repositoryMappings)) !== false) {
            return $key;
        }

        throw new InvalidArgumentException('Invalid class name provided.');
    }

    /**
     * Create a repository for the given class name.
     *
     * @param string $class
     *
     * @return \Blixt\Persistence\Repositories\Repository
     */
    protected function makeRepository(string $class): Repository
    {
        $repositoryClassName = $this->repositoryMappings[$class];

        return new $repositoryClassName($this->driver);
    }
}