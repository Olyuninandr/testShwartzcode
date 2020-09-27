<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Estation;
use Illuminate\Http\Request;

class EstationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Estation::select(['id', 'cityId', 'streetName', 'buildingNumber', 'openingTime', 'closingTime'])
            ->orderBy('cityId', 'DESC')
            ->paginate(15);

        $cities = City::select(['id', 'name'])->orderBy('name', 'ASC')->get();

        return view('Estations/index', compact('stations', 'cities'));
    }

    public function indexFiltered(Request $request)
    {
        $qb = Estation::select(['id', 'cityId', 'streetName', 'buildingNumber', 'openingTime', 'closingTime']);

        if($request->input('city')) {
            $city = $request->input('city');
            $qb->where('cityId', $city);
        }

        if($request->input('isOpen')) {
            $currentTime = date('H:i:s');
            $qb ->where('openingTime','<', $currentTime)
                ->where('closingTime','>', $currentTime);
        }

        $stations= $qb->paginate(15);

        $cities = City::select(['id', 'name'])->orderBy('name', 'ASC')->get();

        return view('Estations/index', compact('stations', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::select(['id', 'name'])
            ->orderBy('name', 'ASC')
            ->get();
        return view('Estations/add', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estation = new Estation();

        $estation->cityId = $request->input('cityId');
        $estation->streetName = $request->input('streetName');
        $estation->buildingNumber = $request->input('buildingNumber');
        $estation->openingTime = $request->input('openingTime');
        $estation->closingTime = $request->input('closingTime');

        $estation->save();
        return redirect()->route('estations')->with('success', 'Станція додана');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estation = Estation::find($id);
        $cities = City::select(['id', 'name'])
            ->orderBy('name', 'ASC')
            ->get();
        return view('Estations/edit', compact('estation', 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $estation = Estation::find($id);

        $estation->cityId = $request->input('cityId');
        $estation->streetName = $request->input('streetName');
        $estation->buildingNumber = $request->input('buildingNumber');
        $estation->openingTime = $request->input('openingTime');
        $estation->closingTime = $request->input('closingTime');

        $estation->save();
        return redirect()->route('estations')->with('success', 'Станція збережена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estation = Estation::find($id)->delete();

        return redirect()->route('estations')->with('success', 'Станція видалена');
    }
}
