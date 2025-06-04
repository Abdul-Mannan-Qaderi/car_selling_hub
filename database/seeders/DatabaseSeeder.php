<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); 


        //  cartype seeder
        CarType::factory()
        ->sequence(
            ['name' => "Sedan"],
            ['name' => "Hatchback"],
            ['name' => "SUV"],
            ['name' => "Pickup Truck"],
            ['name' => "Minivan"],
            ['name' => "Jeep"],
            ['name' => "Coupe"],
            ['name' => "Crossover"],
            ['name' => "SportsCar"],
        )->count(9)->create();


        //  fueltype seeder
        FuelType::factory()
        ->sequence(
            ['name' => "Gasoline"],
            ['name' => "Diesel"],
            ['name' => "Electric"],
            ['name' => "Hybrid"],
        )->count(4)->create();

        $states = [
            'California' => ['Los Angeles', 'San Francisco', 'San Diego', 'San Jose', 'Sacramento', 'Fresno'],
            'Texas' => ['Houston', 'Dallas', 'Austin', 'San Antonio', 'Fort Worth', 'El Paso'],
            'Florida' => ['Miami', 'Orlando', 'Tampa', 'Jacksonville', 'Tallahassee', 'St. Petersburg'],
            'New York' => ['New York City', 'Buffalo', 'Rochester', 'Yonkers', 'Syracuse', 'Albany'],
            'Illinois' => ['Chicago', 'Aurora', 'Naperville', 'Joliet', 'Springfield', 'Peoria'],
            'Pennsylvania' => ['Philadelphia', 'Pittsburgh', 'Allentown', 'Erie', 'Reading', 'Scranton'],
            'Ohio' => ['Columbus', 'Cleveland', 'Cincinnati', 'Toledo', 'Akron', 'Dayton'],
            'Georgia' => ['Atlanta', 'Augusta', 'Columbus', 'Savannah', 'Athens', 'Macon'],
            'North Carolina' => ['Charlotte', 'Raleigh', 'Greensboro', 'Durham', 'Winston-Salem', 'Fayetteville'],
            'Michigan' => ['Detroit', 'Grand Rapids', 'Warren', 'Sterling Heights', 'Ann Arbor', 'Lansing'],
        ];

        foreach ($states as $state=>$cities) {
            State::factory()
            ->state(['name'=> $state])
            ->has(
                City::factory()
                ->count(count($cities))
                ->sequence(...array_map(fn($city)=> ['name' => $city], $cities))
            )
            ->create();
        }


        $makers = [
            'Toyota' => ['Corolla', 'Camry', 'RAV4', 'Highlander', 'Prius', 'Land Cruiser'],
            'Ford' => ['F-150', 'Mustang', 'Explorer', 'Escape', 'Fusion', 'Edge'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot', 'Fit', 'Odyssey'],
            'Chevrolet' => ['Silverado', 'Malibu', 'Equinox', 'Camaro', 'Tahoe', 'Traverse'],
            'Nissan' => ['Altima', 'Sentra', 'Rogue', 'Maxima', 'Pathfinder', 'Versa'],
            'Lexus' => ['RX', 'ES', 'NX', 'IS', 'GX', 'LS'],
        ];
        

        foreach ($makers as $maker => $models) {
            Maker::factory()
            ->state(['name' => $maker])
            ->has(
                Model::factory()
                ->count(count($models))
                ->sequence(...array_map(fn($model) => ['name'=> $model], $models))
            )->create();
        }


        User::factory()
        ->count(3)
        ->create();

        User::factory()
        ->count(2)
        ->has(
            Car::factory()
            ->count(50)
            ->has(
                CarImage::factory()
                ->count(5)
                ->sequence(fn (Sequence $sequence) => 
                    ['position' => $sequence->index % 5+1]),
                    'images'
                )
            ->hasFeatures(),
            'favourite_cars'
        )
        ->create();
    }
}
