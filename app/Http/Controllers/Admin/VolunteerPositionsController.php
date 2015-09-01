<?php

namespace App\Http\Controllers\Admin;

use App\VolunteerPosition;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VolunteerPositionsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return VolunteerPosition::withDrafts()->withExpired()->with('skills')->with('ministry')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request) {
        $position = VolunteerPosition::create($request->input());
        $position->save();
        return ['id' => $position->id];
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        return $this->getItem($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $this->getItem($id)->fill($request->input())->save();
        return ['id' => $id];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        VolunteerPosition::find($id)->delete();
    }

    private function getItem($id) {
        return VolunteerPosition::withDrafts()->withExpired()->find($id);
    }

}