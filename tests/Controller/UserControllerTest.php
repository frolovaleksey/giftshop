<?php

namespace Tests\Feature;

use App\Http\Controllers\UserController;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestHelpers\UserTrait;

class UserControllerTest extends TestCase
{
    /*
     *
     * vendor\bin\phpunit --testsuite Controller
     * vendor\bin\phpunit --filter UserControllerTest
     *
     * var_export($request);
     */

    use UserTrait;

    protected $item_id = 1;
    protected $user_id = 1;

    public function testIndex()
    {
        $user = User::find($this->user_id);
        $this->be($user);

        $url = route('users.index');

        $response = $this->get($url);
        $response->assertOk();

        $headers = ['HTTP_X-Requested-With' => 'XMLHttpRequest'];
        $responseAjax = $this->get($url, $headers);
        $responseAjax->assertOk();
    }

    public function testCreate()
    {
        $user = User::find($this->user_id);
        $this->be($user);

        $url = route('users.create');

        $response = $this->get($url);
        $response->assertOk();
    }

    public function testEdit()
    {
        $user = User::find($this->user_id);
        $this->be($user);

        $url = route('users.edit', ['user' => $this->item_id]);

        $response = $this->get($url);
        $response->assertOk();
    }

    public function testStore()
    {
        $user = User::find($this->user_id);
        $this->be($user);
        $this->cleanUser();

        $userData = time();

        $userRequest = [
            'name' => $userData,
            'email' => $userData.'@test.ts',
            'last_name' => $userData,
            'first_name' => $userData,
        ];

        $this->createUser($userRequest);

        $testUser = User::latest()->first();
        $this->assertEquals($userData, $testUser->name, 'User');
    }

    public function testUpdate()
    {
        $user = User::find($this->user_id);
        $this->be($user);

        $this->cleanUser();
        $this->createUser();
        $newUser = User::latest()->first();

        $userData = time();

        $request = request();
        $request->replace([
            'name' => $userData,
            'email' => $userData.'@test1.ts',
            'last_name' => $userData,
            'first_name' => $userData,
        ]);

        $controller = new UserController();
        $controller->update($request, $newUser->id);

        $testUser = User::find($newUser->id);
        $this->assertEquals($userData, $testUser->name, 'User name');
        $this->assertEquals($userData, $testUser->last_name, 'User last_name');
        $this->assertEquals($userData, $testUser->first_name, 'User first_name');
        $this->assertEquals($userData.'@test1.ts', $testUser->email, 'User email');
    }

    public function testDestroy()
    {
        $user = User::find($this->user_id);
        $this->be($user);

        $this->cleanUser();
        $this->createUser();
        $testUser = User::latest()->first();

        $controller = new UserController();
        $controller->destroy($testUser->id);

        $testUser = User::find($testUser->id);

        $this->assertEquals($testUser, null, 'User delete');
    }
}
