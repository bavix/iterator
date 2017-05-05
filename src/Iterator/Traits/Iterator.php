<?php

namespace Bavix\Iterator\Traits;

trait Iterator
{

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

}
