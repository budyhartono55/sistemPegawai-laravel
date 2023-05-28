<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // main method\
  public function index(){
    $data = Employee::paginate(5);
    $title = "Dashboard";
    
    return view("pegawai/dataPegawai", compact("data","title"));
}

    public function addPegawai(){
    $title = "Tambah Pegawai";

    return view("pegawai/addPegawai", compact("title"));
  }

  public function insertData(Request $request){
    
    $data = Employee::create($request->all());
    if($request->hasFile("photo")){
        $request->file("photo")->move("photoPegawai/", $request->file("photo")->getClientOriginalName());
        $data->photo=$request->file("photo")->getClientOriginalName();
        $data->save();
    }
    return redirect()->route("pegawai")->with("success", "Pegawai berhasil ditambahkan!");
  }

  public function  editPegawai($id){
    $title = "Edit Pegawai";
    $data = Employee::find($id);
    
    return view("pegawai/editPegawai", compact("data", "title"));
  }

  public function updatePegawai(Request $request, $id){
    $data = Employee::find($id);
    $data->update($request->all());

    return redirect()->route("pegawai")->with("success","Pegawai berhasil diupdate!");
  }

  public function deleteData($id){
    $data = Employee::find($id);
    $data->delete();

    return redirect()->route("pegawai")->with("success","Pegawai berhasil dihapus!");

  }
}