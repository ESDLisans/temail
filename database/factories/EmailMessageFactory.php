<?php

namespace Database\Factories;

use App\Models\EmailMessage;
use App\Models\TemporaryEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailMessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmailMessage::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Create a temporary email if none exists
        if (TemporaryEmail::count() === 0) {
            $tempEmail = TemporaryEmail::factory()->create();
        } else {
            $tempEmail = TemporaryEmail::inRandomOrder()->first();
        }
        
        return [
            'temp_email_id' => $tempEmail->id,
            'message_id' => '<' . fake()->uuid() . '@' . fake()->domainName() . '>',
            'from' => fake()->name() . ' <' . fake()->email() . '>',
            'subject' => fake()->sentence(),
            'body_html' => '<html><body><p>' . fake()->paragraph(3) . '</p></body></html>',
            'body_text' => fake()->paragraph(3),
            'headers' => [
                'from' => fake()->name() . ' <' . fake()->email() . '>',
                'subject' => fake()->sentence(),
                'to' => $tempEmail->email,
                'date' => Carbon::now()->format('r'),
            ],
            'is_read' => fake()->boolean(),
            'is_starred' => fake()->boolean(20),
            'received_at' => fake()->dateTimeBetween('-1 week', 'now'),
        ];
    }
    
    /**
     * Indicate that the message is unread.
     */
    public function unread(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'is_read' => false,
            ];
        });
    }
    
    /**
     * Indicate that the message is starred/favorite.
     */
    public function starred(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'is_starred' => true,
            ];
        });
    }
} 