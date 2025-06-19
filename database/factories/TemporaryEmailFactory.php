<?php

namespace Database\Factories;

use App\Models\Domain;
use App\Models\TemporaryEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TemporaryEmailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TemporaryEmail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Create a domain if none exists
        if (Domain::count() === 0) {
            $domain = Domain::factory()->create();
        } else {
            $domain = Domain::inRandomOrder()->first();
        }
        
        $local_part = Str::random(10) . mt_rand(100, 999);
        
        return [
            'email' => $local_part . '@' . $domain->name,
            'local_part' => $local_part,
            'domain_id' => $domain->id,
            'expires_at' => Carbon::now()->addHours(10),
        ];
    }
    
    /**
     * Indicate that the email is expired.
     */
    public function expired(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'expires_at' => Carbon::now()->subHour(),
            ];
        });
    }
} 