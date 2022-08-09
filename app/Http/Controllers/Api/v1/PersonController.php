<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Person as PersonModel;
use App\Http\Resources\v1\PersonResource;
use App\Http\Resources\v1\PersonResourceCollection;
use Faker\Provider\ar_EG\Person;

class PersonController extends Controller
{
    /**
     * it show all the records with pagination
     *
     * @return  PersonResourceCollection[return description]
     */
    public function index(): PersonResourceCollection
    {
        return new PersonResourceCollection(PersonModel::paginate());
    }

        /**
     * show record on the basis of the ids
     *
     * @param Person 
     * $person  id of the person in the table
     * @return PersonResource 
     * envelop all the data in the parent array named as "data"
     */
    public function show(PersonModel $person): PersonResource
    {
        return new PersonResource($person);
    }

    /**
     * [store description]
     *
     * @param   Request  $request  [$request description]
     *
     * @return  [type]             [return description]
     */
    public function store(Request $request)
    {
        # create 

        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required',
            'phone'      => 'required',
            'city'       => 'required',
        ]);

        $person = PersonModel::create($request->all());
        return new PersonResource($person);
    }


    /**
     * [update description]
     *
     * @param   PersonModel     $person   [$person description]
     * @param   Request         $request  [$request description]
     *
     * @return  PersonResource            [return description]
     */
    public function update(PersonModel $person, Request $request): PersonResource
    {
        $person->update($request->all());
        return new PersonResource($person);
    }


    /**
     * [destroy description]
     *
     * @param   PersonModel  $person  [$person description]
     *
     * @return  [type]                [return description]
     */
    public function destroy(PersonModel $person)
    {
        if($person->delete());
        return response()->json(['message' => 'Success']);
    }
}
