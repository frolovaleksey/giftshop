<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleControllerTest extends TestCase
{
    protected $item_id = 1;
    protected $user_id = 1;

    public function testIndex()
    {
        $user = User::find($this->user_id);
        $this->be($user);

        $url = route('roles.index');

        $response = $this->get($url);
        $response->assertOk();
    }

    public function testCreate()
    {
        $user = User::find($this->user_id);
        $this->be($user);

        $url = route('roles.create');

        $response = $this->get($url);
        $response->assertOk();
    }

    public function testEdit()
    {
        $user = User::find($this->user_id);
        $this->be($user);

        $url = route('roles.edit', ['role' => $this->item_id]);

        $response = $this->get($url);
        $response->assertOk();
    }
}
