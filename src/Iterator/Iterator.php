<?php

namespace Bavix\Iterator;

use Bavix\Helpers\JSON;

class Iterator implements \Countable, \Iterator, \Serializable, \ArrayAccess, \JsonSerializable
{

    /**
     * @var array
     */
    protected $data;

    /**
     * Iterator constructor.
     *
     * @param array|null $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function asArray()
    {
        return $this->data;
    }

    /**
     * @param string $offset
     * @param mixed  $default
     *
     * @return mixed
     */
    public function atData($offset, $default = null)
    {
        return $this->data[$offset] ?? $default;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return JSON::encode($this->data);
    }

    /**
     * @return array
     */
    public function __debugInfo()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function export()
    {
        return var_export($this->data, true);
    }

    /**
     * @param string $offset
     *
     * @return array|mixed
     */
    public function __get($offset)
    {
        return $this->offsetGet( $offset );
    }

    /**
     * @param string $offset
     * @param mixed $value
     */
    public function __set($offset, $value)
    {
        $this->offsetSet($offset, $value);
    }

    /**
     * @param string $offset
     *
     * @return bool
     */
    public function __isset($offset)
    {
        return $this->offsetExists($offset);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * @inheritdoc
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * @inheritdoc
     */
    public function next()
    {
        return next($this->data);
    }

    /**
     * @inheritdoc
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * @inheritdoc
     */
    public function valid()
    {
        return $this->key() !== null;
    }

    /**
     * @inheritdoc
     */
    public function rewind()
    {
        reset($this->data);
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        return ['data'];
    }

    /**
     * @inheritdoc
     */
    public function serialize()
    {
        return serialize($this->data);
    }

    /**
     * @inheritdoc
     */
    public function unserialize($serialized)
    {
        $this->data = unserialize($serialized, []);
    }

    /**
     * @inheritdoc
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * @inheritdoc
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    /**
     * @inheritdoc
     */
    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    /**
     * @inheritdoc
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return $this->asArray();
    }

}
