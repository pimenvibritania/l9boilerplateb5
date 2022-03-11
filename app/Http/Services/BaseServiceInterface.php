<?php

namespace App\Http\Services;

interface BaseServiceInterface
{
    public function getEntities();
    public function createEntity();
    public function updateEntity();
    public function deleteEntity();
}
