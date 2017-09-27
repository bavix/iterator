<?php

namespace Bavix\Iterator;

use Bavix\Helpers\JSON;

class Iterator implements \Countable, \Iterator, \Serializable, \ArrayAccess, \JsonSerializable
{

    use Traits\Countable;
    use Traits\Iterator;
    use Traits\Serializable;
    use Traits\ArrayAccess;
    use Traits\JsonSerializable;

    /**
     * @var array
     */
    protected $data;

    /**
     * Iterator constructor.
     *
     * @param array $data
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
        return $this->jsonSerialize();
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
        return $this->offsetGet($offset);
    }

    /**
     * @param string $offset
     * @param mixed  $value
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
     * @return array
     *
     * @codeCoverageIgnore
     */
    public function __sleep()
    {
        return ['data'];
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
     *
     * @codeCoverageIgnore
     */
    public function __debugInfo()
    {
        return $this->data;
    }

}
