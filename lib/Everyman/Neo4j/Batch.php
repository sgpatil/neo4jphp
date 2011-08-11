<?php
namespace Everyman\Neo4j;

/**
 * A set of operations expected to succeed (or fail) atomically
 */
class Batch
{
    protected $client = null;

	protected $operands = array();

	/**
	 * Build the batch and set its client
	 *
	 * @param Client $client
	 */
	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	/**
	 * Add an entity to the batch to save
	 *
	 * @param PropertyContainer $entity
	 * @return integer
	 */
	public function add(PropertyContainer $entity)
	{
		$opId = count($this->operands);
		$this->operands[] = $entity;
		
		return $opId;
	}

	/**
	 * Get the batch's client
	 *
	 * @return Client
	 */
	public function getClient()
	{
		return $this->client;
	}
}
