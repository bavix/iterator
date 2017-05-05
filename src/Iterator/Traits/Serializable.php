<?php

namespace Bavix\Iterator\Traits;

trait Serializable
{

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
