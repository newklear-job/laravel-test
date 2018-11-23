<?php


use Illuminate\Database\Seeder;


class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::allow('admin')->everything();

        Bouncer::allow('user')->to('see-user-related-content');
    }
}
