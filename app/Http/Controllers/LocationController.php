<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function index(){
        /*
         * load all locations
         */
        $locations = Location::all();
        return $locations;
    }

    /**
     * create new location
     */
    public function save(Request $request) : JsonResponse  {
        /*+
        *  use a transaction for saving model including relations
        * if one query fails, complete SQL statements will be rolled back
        */
        DB::beginTransaction();
        try {
            $location = Location::create($request->all());
            DB::commit();
            // return a vaild http response
            return response()->json($location, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("saving location failed: " . $e->getMessage(), 420);
        }
    }

    /*
     * update location
     */
    public function update(Request $request, string $name) : JsonResponse
    {
        DB::beginTransaction();
        try {
            $location = Location::all()->where('name', $name)->first();

            if ($location != null) {
                $location->update($request->all());
                $location->save();
            }

            DB::commit();
            $location1 = Location::all()->where('name', $name)->first();
            // return a vaild http response
            return response()->json($location1, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating location failed: " . $e->getMessage(), 420);
        }
    }

    /**
     * returns 200 if location deleted successfully, throws excpetion if not
     */
    public function delete(string $name) : JsonResponse
    {
        $location = Location::where('name', $name)->first();
        if ($location != null) {
            $location->delete();
        }
        else
            throw new \Exception("location couldn't be deleted - it does not exist");
        return response()->json('location (' . $location . ') successfully deleted', 200);
    }
}
