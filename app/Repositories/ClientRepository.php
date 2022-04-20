<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ClientRepository extends BaseRepository
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
        return Client::class;
    }

    /**
     * @param array $data
     *
     * @return Client
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data): Client
    {
        return DB::transaction(function () use ($data) {
            $client = parent::create([
                'nom' => Arr::get($data,'nom'),
                'adresse' => Arr::get($data,'adresse'),
                'cp' => Arr::get($data,'cp'),
                'ville' => Arr::get($data,'ville'),
                'pays_id' => Arr::get($data,'pays_id'),
            ]);

            if ($client) {
                return $client;
            }

            throw new GeneralException('Error encountered during creation !');
        });
    }

    /**
     * @param Client $client
     * @param array $data
     * @return Client
     */
    public function update(Client $client, array $data): Client
    {

        return DB::transaction(function () use ($client, $data) {
            if ($client->update([
                'nom' => Arr::get($data,'nom'),
                'adresse' => Arr::get($data,'adresse'),
                'cp' => Arr::get($data,'cp'),
                'ville' => Arr::get($data,'ville'),
                'pays_id' => Arr::get($data,'pays_id'),
            ])) {
                return $client;
            }

            throw new GeneralException('Error encountered during modification !');
        });
    }
}