<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->string('password');
            // $table->string('address')->nullable();
            // $table->string('avatar')->nullable();
            // $table->string('gender');
            // $table->date('birthdate');
            // $table->integer('phone')->nullable();
            // $table->tinyInteger('role')->default(User::TYPE_USER);
            // $table->timestamp('email_verified_at')->nullable();
            // $table->rememberToken();
            // $table->timestamps();
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'address' => fake()->address(),
            'avatar' => '',
            'gender' => fake()->randomElement([1, 2, 3]),
            'birthdate' => fake()->date(),
            'phone' => '09' . fake()->regexify('[0-9]{8}'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
