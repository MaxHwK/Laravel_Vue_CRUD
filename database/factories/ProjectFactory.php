<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'numero' => $faker->numero,
            'nom' => $faker->nom,
            'description' => $faker->description,
            'technologies' => $faker->technologies,
            'client' => $faker->client,
            'type' => $faker->type,
            'responsable' => $faker->responsable,
            'date_debut' => $faker->date_debut,
            'date_fin_estimee' => $faker->date_fin_estimee,
            'date_fin_reelle' => $faker->date_fin_reelle,
            'created_at' => $faker->created_at,
            'updated_at' => $faker->updated_at,
        ];    
    }
}
