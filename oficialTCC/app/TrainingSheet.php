<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingSheet extends Model
{
    protected $table = 'trainingsheets';# Usando a tabela trainingsheets do BD

    public function physicalExercise()
    {
        return $this->belongsToMany(
            PhysicalExercise::class,
            'training_has_exercises',
            'idficha',
            'idexercicio'
        );
    }
}
