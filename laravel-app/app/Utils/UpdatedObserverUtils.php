<?php

namespace App\Utils;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;

class UpdatedObserverUtils
{
    /**
     * @param Model $model
     * @return array
     */
    public function getChangesDescription(Model $model): array
    {
        $originalValues = $model->getOriginal();

        $changedFields = $model->getDirty();

        $changesDescription = [];

        foreach ($changedFields as $field => $newValue) {
            $oldValue = $originalValues[$field];
            $changesDescription[] = "$field alterado de $oldValue para '$newValue'";
        }
        return $changesDescription;
    }
}
