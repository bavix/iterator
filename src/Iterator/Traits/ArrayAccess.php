<?php

namespace Bavix\Iterator\Traits;

trait ArrayAccess
{

    /**
     * @inheritdoc
     * @param string $offset
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * @inheritdoc
     * @param string $offset
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    /**
     * @inheritdoc
     * @param string $offset
     */
    public function offsetSet($offset, $value)
    {
        if ($offset === null)
        {
            $this->data[] = $value;

            return;
        }

        $this->data[$offset] = $value;
    }

    /**
     * @inheritdoc
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

}
