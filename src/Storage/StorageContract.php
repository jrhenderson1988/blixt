<?php

namespace Blixt\Storage;

use Blixt\Index\Schema\Schema;

interface StorageContract
{
    /**
     * Get the name of the schema represented by the storage engine.
     *
     * @return string
     */
    public function getName();

    /**
     * Tell if the storage represented by the engine exists.
     *
     * @return boolean
     */
    public function exists();

    /**
     * Create the storage represented by the engine.
     *
     * @param \Blixt\Index\Schema\Schema $schema
     *
     * @return bool
     */
    public function create(Schema $schema);

    /**
     * Destroy the storage represented by the engine.
     *
     * @return boolean
     */
    public function destroy();

    /**
     * Execute the provided closure in a transaction. The return value of the closure is returned from this method. If
     * any exceptions are thrown within the closure, the transaction is rolled back.
     *
     * @param callable $callable
     *
     * @return mixed
     */
    public function transaction(callable $callable);

    /**
     * Load all of the columns from the storage as a collection.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getColumns();

    /**
     * Find a document in the storage by the given key. If no such document exists, null should be returned.
     *
     * @param mixed $key
     *
     * @return \Blixt\Documents\Document|null
     */
    public function findDocumentByKey($key);


    public function createDocument($key);

//    public function findTermByName($name);
//    public function findTermsByName(Collection $names);
//    public function createTerm($name);
//    public function createTerms(Collection $names);
//    public function findSchemaByName($name);
//    public function createSchema($name);
//    public function findColumn($schemaId, $name);
//    public function findColumns($schemaId, Collection $names);
//    public function createColumn($schemaId, $name);
//    public function createColumns($schemaId, Collection $names);
//    public function findDocument($schemaId, $primaryKey);
//    public function findDocuments($schemaId, Collection $primaryKeys);
//    public function createDocument($schemaId, $primaryKey);
//    public function createDocuments($schemaId, Collection $primaryKeys);
//    public function findAttribute($documentId, $columnId);
//    public function findAttributes($documentId, Collection $columnIds);
//    public function createAttribute($documentId, $columnId, $value);
//    public function createAttributes($documentId, $columnId, $value);
}