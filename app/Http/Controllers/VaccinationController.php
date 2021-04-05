<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vaccination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VaccinationController extends Controller
{
    public function index(){
        /**
         * load all vaccinations and relations with eager(sofort) loading
         */
        $vaccinations = Vaccination::with(["location", "users"])->get();
        return $vaccinations;
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
            $vaccination = Vaccination::create($request->all());

            // save users
            if (isset($request['users']) && is_array($request['users'])) {
                foreach ($request['users'] as $u) {
                    $user = User::firstOrNew([
                        'name'=>$u['name'],
                        'email'=>$u['email'],
                        'gender'=>$u['gender'],
                        'firstname'=>$u['firstname'],
                        'lastname'=>$u['lastname'],
                        'dateOfBirth'=>$u['dateOfBirth'],
                        'socialSecurityNumber'=>$u['socialSecurityNumber'],
                        'phonenumber'=>$u['phonenumber'],
                        'vaccinated'=>$u['vaccinated'],
                        'isAdmin'=>$u['isAdmin'],
                        'vaccination_id'=>$u['vaccination_id'],
                        ]);
                    $vaccination->users()->save($user);
                }
            }
            DB::commit();
            // return a vaild http response
            return response()->json($vaccination, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("saving user failed: " . $e->getMessage(), 420);
        }
    }

    /*
 * update vaccination
 */
    public function update(Request $request, string $id) : JsonResponse
    {
        DB::beginTransaction();
        try {
            $vaccination = Vaccination::all()->where('id', $id)->first();

            if ($vaccination != null) {
                $vaccination->update($request->all());
                $vaccination->users()->delete();
                if (isset($request['users']) && is_array($request['users'])) {
                    foreach ($request['users'] as $u) {
                        $user = User::firstOrNew([
                            'name' => $u['name'],
                            'email' => $u['email'],
                            'gender' => $u['gender'],
                            'firstname' => $u['firstname'],
                            'lastname' => $u['lastname'],
                            'dateOfBirth' => $u['dateOfBirth'],
                            'socialSecurityNumber' => $u['socialSecurityNumber'],
                            'phonenumber' => $u['phonenumber'],
                            'vaccinated' => $u['vaccinated'],
                            'isAdmin' => $u['isAdmin'],
                            'vaccination_id' => $u['vaccination_id'],
                        ]);
                        $vaccination->users()->save($user);
                    }
                }
                $vaccination->save();
            }

            DB::commit();
            $vaccination1 = Vaccination::all()->where('id', $id)->first();
            // return a vaild http response
            return response()->json($vaccination1, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating vaccination failed: " . $e->getMessage(), 420);
        }
    }

    /**
     * returns 200 if vaccination deleted successfully, throws excpetion if not
     */
    public function delete(string $id) : JsonResponse
    {
        $vaccination = Vaccination::where('id', $id)->first();
        if ($vaccination != null) {
            $vaccination->delete();
        }
        else
            throw new \Exception("vaccination couldn't be deleted - it does not exist");
        return response()->json('vaccination (' . $vaccination . ') successfully deleted', 200);
    }

    /**
     * modify / convert values if needed
     */
    private function parseRequest(Request $request) : Request {
        // get date and convert it - its in ISO 8601, e.g. "2018-01-01T23:00:00.000Z"
        $date = new \DateTime($request->dateOfVaccination);
        $request['dateOfBirth'] = $date;
        return $request;
    }
}
