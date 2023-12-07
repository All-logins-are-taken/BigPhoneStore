<?php

namespace BigPhoneStore\src\Entity;

class Product
{

    public const HEADINGS = ['make', 'model', 'colour', 'capacity', 'network', 'grade', 'condition', 'count'];

    private string $make;

    private string $model;

    private string $colour;

    private string $capacity;

    private string $network;

    private string $grade;

    private string $condition;

    public function __construct()
    {
    }

    public function setMake(string $make): self
    {
        $this->make = $make;

        return $this;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function setColour(string $colour): self
    {
        $this->colour = $colour;

        return $this;
    }

    public function setCapacity(string $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function setNetwork(string $network): self
    {
        $this->network = $network;

        return $this;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function setCondition(string $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    public function getProduct(): string
    {
        return $this->make . "\n" . $this->model . "\n" . $this->colour . "\n" . $this->capacity . "\n" . $this->network . "\n" . $this->grade . "\n" . $this->condition . "\n";
    }

}
