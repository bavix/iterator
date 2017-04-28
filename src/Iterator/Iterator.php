<?php

namespace Bavix\Iterator;

class Iterator implements \Countable, \Iterator, \Serializable
{

    /**
     * @var array
     */
    protected $data;

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

}
