<?php

namespace Bavix\Iterator\Traits;

trait Countable
{

    /**
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }

}
