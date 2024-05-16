<?php

declare(strict_types=1);

/**
 * file: CollectionAbstract.php
 *
 * @author Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Model;

use InvalidArgumentException;

/**
 * Class CollectionAbstract
 *
 * @package Szybo\Pokemon\Model
 */
abstract class CollectionAbstract
{
    private array $items = [];
    private int $position = 0;

    /**
     * @return mixed
     */
    public function current(): mixed
    {
        return $this->items[$this->position];
    }

    /**
     * @return void
     */
    public function next(): void
    {
        ++$this->position;
    }

    /**
     * @return mixed
     */
    public function key(): mixed
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->items[$this->position]);
    }

    /**
     * @return void
     */
    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * @param  mixed  $offset
     *
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->items[$offset]);
    }

    /**
     * @param  mixed  $offset
     *
     * @return mixed
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->items[$offset] ?? null;
    }

    /**
     * @param  mixed  $offset
     * @param  mixed  $value
     *
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!(is_object($value) && (get_class($value) == $this->getItemType()))) {
            throw new InvalidArgumentException('Invalid type of value. Expected '.$this->getItemType().'.');
        }

        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    /**
     * @param  mixed  $offset
     *
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->items[$offset]);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @param  array  $data
     *
     * @return void
     */
    public function addData(array $data): void
    {
        foreach ($data as $item) {
            $type = $this->getItemType();
            if (!($item instanceof $type)) {
                throw new InvalidArgumentException('Invalid item type. Expected: ' . $type . ' Got: ' . get_class($item));
            }
            $this->offsetSet(null, $item);
        }
    }
}
