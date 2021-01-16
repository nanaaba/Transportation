<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Color;
use App\Car_model;
use App\Fueltype;
use App\Model_year;
use App\Relationship;
use App\Bank;
use Illuminate\Support\Facades\Mail;

class ConfigurationController extends Controller {

    public function showcolors() {

        $colors = $this->getColors();
        return view('colors')->with('colors', $colors);
    }

    public function showrelationship() {

        $relationships = $this->getRelationships();
        return view('relationship')->with('relationship', $relationships);
    }

    public function showcarmodels() {

        $carmodels = $this->getCarmodels();
        return view('carmodels')->with('carmodels', $carmodels);
    }

    public function showcarmodelyear() {

        $modelyear = $this->getModelYears();
        return view('modelyear')->with('years', $modelyear);
    }

    public function showfueltypes() {

        $fueltypes = $this->getFuelTypes();
        return view('fueltypes')->with('fueltypes', $fueltypes);
    }

    public function showbanks() {
        $banks = $this->getBanks();
        return view('banks')->with('banks', $banks);
    }

    public function getColors() {
        return Color::all()->toJson();
    }

    public function getRelationships() {
        return Relationship::all()->toJson();
    }

    public function getModelYears() {
        return Model_year::all()->toJson();
    }

    public function getCarmodels() {

        return Car_model::all()->toJson();
    }

    public function getFuelTypes() {
        return Fueltype::all()->toJson();
    }

    public function getGenericConfigurations($tablename) {

        $configurations = array("body_types", "brand", "car_parts_accessories", "colors"
            , "vehicle_types", "car_models");

        if (in_array($tablename, $configurations)) {
            $results = DB::table($tablename)->get();

            return json_encode($results);
        }
        return 'try not to hack';
    }

    public function getBrandModels($brand) {
        $results = DB::table("car_models")->where("brand", $brand)->get();
        return json_encode($results);
    }

    public function saveColor(Request $request) {

        $data = $request->all();



        try {
            $user = Color::create($request->all());

          
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function deleteColor($id) {


        $new = Color::find($id);
        $new->delete();
    }

    public function saveModelYear(Request $request) {

        $data = $request->all();

        try {
            $new = new Model_year;
            $new->name = $data['name'];
            $new->save();
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function deleteModelYear($id) {


        $new = Model_year::find($id);
        $new->delete();
    }

    public function saveRelationship(Request $request) {

        $data = $request->all();

        try {
            $new = new Relationship;
            $new->name = $data['name'];
            $new->save();
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function deleteRelationship($id) {


        $new = Relationship::find($id);
        $new->delete();
    }

    public function saveCarModel(Request $request) {

        $data = $request->all();


        try {
            $new = new Car_model;
            $new->name = $data['name'];
            $new->save();
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function deleteCarModel($id) {


        $new = Car_model::find($id);
        $new->delete();
    }

    public function saveFuelType(Request $request) {

        $data = $request->all();


        try {
            $new = new Fueltype;
            $new->name = $data['name'];
            $new->save();
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function deleteFuelType($id) {


        $new = Fueltype::find($id);
        $new->delete();
    }

    //deleteBank
    public function deleteBank($id) {


        $new = Bank::find($id);
        $new->delete();
    }

    public function getBanks() {
        return Bank::all()->toJson();
    }

    public function saveGenericConfigurations($tablename, $name) {
        $users = DB::table($tablename)->get();
        DB::table($tablename)->insert(
                array('name' => $name)
        );
        return 0;
    }

    public function saveBank(Request $request) {
        $data = $request->all();


        try {
            $new = new Bank;
            $new->name = $data['name'];
            $new->save();
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function showsettings() {

        return view('settings');
    }

}
