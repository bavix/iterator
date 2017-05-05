<?php

namespace Bavix\Iterator\Traits;

trait IteratorAggregate
{

    /**
     * @return Iterator
     */
    public function getIterator()
    {
        return new \Bavix\Iterator\Iterator($this->data);
    }

}
