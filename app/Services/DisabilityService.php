<?php

namespace App\Services;

use App\Models\Disability;

class DisabilityService
{
    public function store(array $data): Disability
    {
        $disability = Disability::create($data);

        return $disability ?: null;
    }

    public function update(array $data, $disability): Disability
    {
        return $disability->update($data) ? $disability : null;
    }

    public function destroy($disability): Disability
    {
        return $disability->delete() ? $disability : null;
    }
}