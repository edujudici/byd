<?php

namespace App\Http\Api;

interface HomeInterface {
    public function find($id);
    public function findBy($att, $column);
}