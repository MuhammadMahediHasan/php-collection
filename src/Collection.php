<?php

namespace Collection;

class Collection
{
    private $collect;

    public function __construct(array $collect)
    {
        $this->collect = $collect;
    }

    public static function make(array $collect) {
        return new static($collect);
    }

    public function filter(callable $callback): Collection
    {
        $collection = [];
        foreach ($this->collect as $key => $value) {
            if ($callback($key, $value)) {
                $collection [] = $value;
            }
        }
        $this->collect = $collection;
        return $this;
    }

    public function map(callable $callback): Collection
    {
        $collection = [];
        foreach ($this->collect as $key => $value) {
            $collection [] = $callback($value, $key);
        }

        $this->collect = $collection;

        return $this;
    }

    public function toJson() {
        return json_encode($this->collect);
    }
}