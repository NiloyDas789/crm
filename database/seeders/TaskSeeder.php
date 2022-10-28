<?php

namespace Database\Seeders;

use App\Models\Dashboard\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createTasks();
    }


    private function createTasks()
    {
        $task=['Application','Offer Letter','Fee Payment','COE','Visa Application','Enrollment','Course Ongoing'];

        for ($i=0; $i < count($task) ; $i++) {
            Task::create([
                'title'      => $task[$i],
            ]);
        }
    }
}
