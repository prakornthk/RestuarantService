<?php

namespace App\Services\Interfaces;

interface RestuarantInterface
{
    public function setUrlDirection(string $targetDirection);
    public function excuse();
    public function getResponse();
}