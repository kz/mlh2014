<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the user table seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $user = User::create(array(
                'is_tutor' => 0,
                'phone_number' => '+44' . $faker->numerify($string = '##########'),
                'email_address' => 't4u' . $faker->firstName . $faker->lastName . '@mailinator.com',
                'password' => 'password',
                'home_address' => $faker->address,
            ));
        }

        for ($i = 0; $i < 10; $i++) {
            $user = User::create(array(
                'is_tutor' => 1,
                'phone_number' => '+44' . $faker->numerify($string = '##########'),
                'email_address' => 't4u' . $faker->firstName . $faker->lastName . '@mailinator.com',
                'password' => 'password',
                'home_address' => $faker->address,
            ));

            $tutor = Tutor::create(array(
                'user_id' => $user->id,
                'degree' => array_rand(array('Chemistry', 'Physics', 'Computer Science', 'Languages', 'Mathematics', 'Biology', 'Art', 'History', 'English', 'Geography')),
                'ratings' => $faker->numberBetween($min = 1, $max = 5),
                'rating' => $faker->numberBetween($min = 1, $max = 5) . '.0',
                'hourly_rate' => $faker->numberBetween($min = 10, $max = 25) . '.00'
            ));
        }

	}

}
