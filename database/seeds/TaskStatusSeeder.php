<?php

use Illuminate\Database\Seeder;
use App\Status;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status();
        $status->name = 'TODO';
        $status->save();

        $status = new Status();
        $status->name = 'DOING';
        $status->save();

        $status = new Status();
        $status->name = 'DONE';
        $status->save();
    }
}
