<?php

namespace Tests\Feature;

use App\Models\Domain;
use App\Models\TemporaryEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cookie;
use Tests\TestCase;

class TempMailTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Create a test domain
        Domain::factory()->create([
            'name' => 'example.com',
            'is_active' => true,
        ]);
    }

    public function test_index_page_loads_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('temp-mail');
    }

    public function test_can_regenerate_email(): void
    {
        $response = $this->postJson('/regenerate');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'email'
        ]);
        $response->assertJson(['success' => true]);
        
        // Check that email has correct format
        $email = $response->json('email');
        $this->assertStringContainsString('@example.com', $email);
    }

    public function test_can_refresh_inbox(): void
    {
        // Create a temporary email for testing
        $domain = Domain::factory()->create(['name' => 'test.com', 'is_active' => true]);
        $tempEmail = TemporaryEmail::factory()->create([
            'domain_id' => $domain->id,
            'expires_at' => now()->addHours(10)
        ]);
        
        // Set session to simulate user with this email
        $response = $this->withSession(['temp_email_id' => $tempEmail->id])
            ->getJson('/refresh-inbox');

        // Debug response if it fails
        if ($response->status() !== 200) {
            dump($response->json());
        }

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'messages',
            'timeLeft'
        ]);
    }

    public function test_returns_404_when_email_not_found(): void
    {
        $response = $this->getJson('/refresh-inbox');

        $response->assertStatus(404);
        $response->assertJson(['error' => 'No temporary email found']);
    }

    public function test_can_delete_email(): void
    {
        // Create a temporary email for testing
        $domain = Domain::factory()->create(['name' => 'test.com', 'is_active' => true]);
        $tempEmail = TemporaryEmail::factory()->create([
            'domain_id' => $domain->id,
            'expires_at' => now()->addHours(10)
        ]);
        
        // Set session to simulate user with this email
        $response = $this->withSession(['temp_email_id' => $tempEmail->id])
            ->postJson('/delete-email');

        // Debug response if it fails
        if ($response->status() !== 200 || !$response->json('success')) {
            dump($response->json());
        }

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Email deleted successfully'
        ]);
        
        // Verify email is deleted from database
        $this->assertDatabaseMissing('temporary_emails', [
            'id' => $tempEmail->id
        ]);
    }
} 