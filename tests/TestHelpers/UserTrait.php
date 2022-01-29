<?php


namespace Tests\TestHelpers;

use App\Http\Controllers\UserController;
use App\User;
use Illuminate\Support\Facades\DB;

trait UserTrait
{
    public function cleanUser()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::where('id', '!=', 1)->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function createUser($specialRequest=false)
    {
        $userData = time();

        $request = request();
        $request->replace([
            'name' => $userData,
            'email' => $userData.'@test.ts',
            'last_name' => $userData,
            'first_name' => $userData,
        ]);

        if($specialRequest){
            $request->replace(
                $specialRequest
            );
        }

        $controller = new UserController();
        $controller->store($request);
    }
}
