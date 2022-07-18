<?php

namespace Database\Seeders;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeedar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory(2)->create();
    }
}
