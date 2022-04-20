<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Project;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProjectRepository extends BaseRepository
{
    public function __construct()
    {
        return parent::__construct();
    }
    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    public function model()
    {
        return Project::class;
    }

    /**
     * @param array $data
     *
     * @return Project
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data): Project
    {
        return DB::transaction(function () use ($data) {
            $projet = parent::create([
                'numero' => Arr::get($data,'numero'),
                'nom' => Arr::get($data,'nom'),
                'description' => Arr::get($data,'description'),
                'technologies' => Arr::get($data,'technologies'),
                'client_id' => Arr::get($data,'client_id'),
                'type_id' => Arr::get($data,'type_id'),
                'responsable' => Arr::get($data,'responsable'),
                'date_debut' => Arr::get($data,'date_debut'),
                'date_fin_estimee' => Arr::get($data,'date_fin_estimee'),
                'date_fin_reelle' => Arr::get($data,'date_fin_reelle'),
            ]);

            if ($projet) {
                return $projet;
            }

            throw new GeneralException('Error encountered during creation !');
        });
    }

    /**
     * @param Project $projet
     * @param array $data
     * @return Project
     */
    public function update(Project $projet, array $data): Project
    {

        return DB::transaction(function () use ($projet, $data) {
            if ($projet->update([
                'numero' => Arr::get($data,'numero'),
                'nom' => Arr::get($data,'nom'),
                'description' => Arr::get($data,'description'),
                'technologies' => Arr::get($data,'technologies'),
                'client_id' => Arr::get($data,'client_id'),
                'type_id' => Arr::get($data,'type_id'),
                'responsable' => Arr::get($data,'responsable'),
                'date_debut' => Arr::get($data,'date_debut'),
                'date_fin_estimee' => Arr::get($data,'date_fin_estimee'),
                'date_fin_reelle' => Arr::get($data,'date_fin_reelle'),
            ])) {
                return $projet;
            }

            throw new GeneralException('Error encountered during modification !');
        });
    }
}