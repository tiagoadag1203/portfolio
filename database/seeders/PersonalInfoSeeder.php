<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PersonalInfo;

class PersonalInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        PersonalInfo::create([
            'bio' => 'testetestetestetestetestetestetestetestetestetestetestetestetesteteste',
            'image' => 'https://imgs.search.brave.com/DVpLrO5wu5D8tw15DwTZotTqAj9k1NlXpY7CRZHXnm4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/dmV0b3Jlcy1wcmVt/aXVtL3VtLWRlc2Vu/aG8tZGUtdW0taG9t/ZW0tY29tLXVtLWZ1/bmRvLWF6dWwtcXVl/LWRpei1xdWUtZS11/bS1ob21lbS1yZWFs/XzEyMzA0NTctMzIz/MTIuanBnP3NlbXQ9/YWlzX2h5YnJpZA',
        ]);
    }
}
