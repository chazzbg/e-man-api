<?php

namespace App\Jobs;

use App\Location;
use App\LocationData;

class LocationUpdate extends Job
{
    /** @var LocationData */
    private $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(LocationData $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Location::create([
            'id_user' => $this->data->getId(),
            'lat' => $this->data->getLat(),
            'lng' => $this->data->getLng(),
            'elevation' => $this->data->getElevation(),
        ]);
    }
}
