<?php
namespace Show\Result\Api\Data;

interface ViewInterface
{
    /**#@+
     * Constants for keys of data array
     */
    const ID         = 'entity_id';
    const NAME       = 'name';
    const ADDRESS    = 'address';
    const NUMBER     = 'number';
    const CREATED_AT = 'created_at';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get Name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Get Address
     *
     * @return string|null
     */
    public function getAddress();

    /**
     * Get Number
     *
     * @return string|null
     */
    public function getNumber();

    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Set Address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address);

    /**
     * Set Number
     *
     * @param string $number
     * @return $this
     */
    public function setNumber($number);

    /**
     * Set Created At
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);
}
