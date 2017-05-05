<?php

namespace Bavix\Iterator\Traits;

trait JsonSerializable
{

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return $this->data;
    }

}
