<?php

namespace Tests\Feature\pkg_notifications;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\pkg_notifications\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NotificationsTest extends TestCase
{
    use DatabaseTransactions;

    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new Notification;
    }

    public function test_paginate_notifications(): void
    {
        $notifications = $this->model->paginate(2);
        $this->assertNotNull($notifications);
        $this->assertNotEmpty($notifications);
    }

    public function test_create_notifications(): void
    {
        $data = [
    'title' => 'Félicitations',
    'message' => 'Vous avez réussi lexamen',
    'isVue' => true,
    'apprenant_id' => 1,

        ];

        $this->model->create($data);
        $this->assertDatabaseHas('notifications', ['title' => $data['title']]);
    }


    public function test_update_notifications(): void
    {
        $existingNotifications = $this->model->create([
            'title' => 'Félicitations',
            'message' => 'Vous avez réussi lexamen',
            'isVue' => true,
            'apprenant_id' => 1,
        ]);

        $newName = 'UpdatedNotifications';
        $existingNotifications->update(['title' => $newName]);

        $this->assertEquals($newName, $existingNotifications->title);
        $this->assertDatabaseHas('notifications', ['title' => $newName]);

    }

    public function test_delete_notifications(): void
    {
        $existingNotifications = $this->model->create([
            'title' => 'Félicitations',
            'message' => 'Vous avez réussi lexamen',
            'isVue' => true,
            'apprenant_id' => 1,
        ]);

        $existingNotifications->delete();

        $this->assertDatabaseMissing('notifications', ['id' => $existingNotifications->id]);
    }
}