<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\App;
use League\CommonMark\Ext\Table\Table;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i <= 10; $i++) {
            DB::table('pegawai')->insert([
                'nip' => $faker->ean8,
                'nama_lengkap' => $faker->firstName,
                'email' => $faker->email,
                'alamat' => $faker->address,
            ]);
        }
    }
}
