<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function getAllProvinces()
    {
        return $this->where('sub_of', 0)->orderBy('name')->get();
    }
    /**
     * Get all direct sub addresses of a province, district, or commune.
     *
     * @param int $id
     *
     * @return Collection
     */
    public function getSubAddresses($id)
    {
        return $this->where('sub_of', $id)->orderBy('name')->get();
    }
}
