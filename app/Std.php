<?php

namespace pz6\app;

class Std {
    public function fromArray($data)
    {
        $data = (array)$data;
        foreach ($data as $key => $value) {
            if (is_null($value) || is_scalar($value)) {
                $this->{$key} = $value;
            } else {
                $this->{$key} = new static;
                $this->{$key}->fromArray($value);
            }
        }
        return $this;
    }
} 