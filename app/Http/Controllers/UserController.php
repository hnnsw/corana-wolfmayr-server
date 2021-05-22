<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        /*
         * load all users
         */
        $users = User::all();
        return $users;
    }

    /**
     * get user by id
     */
    public function findById(int $id) {
        $user = User::where('id', $id)->first();
        return $user;
    }

    /**
     * get user by name
     */
    public function findByName(string $name){
        $user = User::where('username',$name)->first();
        return $user;
    }

    /**
     * create new user
     */
    public function save(Request $request) : JsonResponse  {
        $request = $this->parseRequest($request);
        /*+
        *  use a transaction for saving model including relations
        * if one query fails, complete SQL statements will be rolled back
        */
        DB::beginTransaction();
        try {
            $user = User::create($request->all());

            if (isset($request['password'])) {
                $request['password'] = bcrypt($request['password']);
            }

            DB::commit();
            // return a vaild http response
            return response()->json($user, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("saving user failed: " . $e->getMessage(), 420);
        }
    }

    /*
     * update user
     */
    public function update(Request $request, string $name) : JsonResponse
    {
        DB::beginTransaction();
        try {
            $user = User::all()->where('username', $name)->first();

            if ($user != null) {
                $user->update($request->all());
                $user->save();
            }

            DB::commit();
            $user1 = User::all()->where('username', $name)->first();
            // return a vaild http response
            return response()->json($user1, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating user failed: " . $e->getMessage(), 420);
        }
    }

    /**
     * returns 200 if user deleted successfully, throws excpetion if not
     */
    public function delete(string $name) : JsonResponse
    {
        $user = User::where('username', $name)->first();
        if ($user != null) {
            $user->delete();
        }
        else
            throw new \Exception("user couldn't be deleted - it does not exist");
        return response()->json('user (' . $user . ') successfully deleted', 200);
    }

    /**
     * modify / convert values if needed
     */
    private function parseRequest(Request $request) : Request {
        // get date and convert it - its in ISO 8601, e.g. "2018-01-01T23:00:00.000Z"
        $date = new \DateTime($request->dateOfBirth);
        $request['dateOfBirth'] = $date;
        return $request;
    }
}
