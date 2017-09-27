<?php

namespace Tests;

use Bavix\Iterator\Iterator;
use Bavix\Iterator\Traits\IteratorAggregate;
use Bavix\Tests\Unit;

class IteratorTest extends Unit
{

    use IteratorAggregate;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var Iterator
     */
    protected $iterator;

    public function setUp()
    {
        parent::setUp();
        $this->data     = range(1, 100);
        $this->iterator = new Iterator($this->data);
    }

    public function testIterator()
    {
        foreach ($this->iterator as $key => $item)
        {
            $this->assertSame($key + 1, $item);
        }
    }

    public function testJson()
    {
        $this->assertJsonStringEqualsJsonString(
            \json_encode($this->iterator),
            (string)$this->iterator
        );
    }

    public function testSerialize()
    {
        $serialize = \serialize($this->iterator);

        $this->assertArraySubset(
            \unserialize($serialize, []),
            $this->iterator
        );
    }

    public function testExists()
    {
        for ($i = $this->iterator->key(); $i < $this->iterator->count(); $i++)
        {
            $this->assertTrue(isset($this->iterator[$i]));
            $this->assertSame($this->iterator[$i], $i + 1);
        }

        $this->assertFalse(isset($this->iterator[$this->iterator->count() + 1]));
    }

    public function testOffsetSet()
    {
        foreach (\range(1, 100) as $item)
        {
            $this->iterator[] = $item;
        }

        $this->assertArraySubset(
            $this->iterator->asArray(),
            array_merge(
                \range(1, 100),
                \range(1, 100)
            )
        );

        foreach (\range(1, 200) as $key => $value)
        {
            $this->iterator[$key] = $value;
        }

        $this->assertArraySubset(
            $this->iterator,
            \range(1, 200)
        );

        foreach (\range(1, 200) as $key => $item)
        {
            unset($this->iterator[$key]);
        }

        $this->assertEmpty($this->iterator->asArray());
    }

    public function testAtData()
    {
        $this->assertEquals($this->iterator->atData('0'), 1);
        $this->assertNull($this->iterator->atData('hello'));
    }

    public function testExport()
    {
        $this->assertEquals(
            \var_export($this->iterator->asArray(), true),
            $this->iterator->export()
        );
    }

    public function testArraySubset()
    {
        $this->assertArraySubset(
            $this->getIterator(),
            $this->iterator
        );
    }

    public function testMagicMethods()
    {
        foreach (\range(1, 100) as $key => $item)
        {
            $this->assertEquals($this->iterator->{$key}, $item);

            $this->iterator->{$key} = $item << 1;
            $this->assertEquals($this->iterator->{$key}, $item << 1);

            $this->assertTrue(isset($this->iterator->{$key}));

            unset($this->iterator->{$key});
            $this->assertFalse(isset($this->iterator->{$key}));
        }
    }

}
