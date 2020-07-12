<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicalExercise extends Model
{
    protected $table = 'physicalexercises'; #Usando a tabela physicalexercises do BD

    public function trainingSheet()
    {
        return $this->belongsToMany(
            Trainingsheet::class,
            'training_has_exercises',
            'idexercicio',
            'idficha'
        );
    }
}
