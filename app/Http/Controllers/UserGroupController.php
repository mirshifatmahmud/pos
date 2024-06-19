<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    public function index(){
        $this->data['groups'] = Group::all();
        return view('groups.groups',$this->data);
    }

    public function create(){
        return view('groups.create');
    }

    public function store(Request $request){
        $formData = $request->all();
        if(Group::create($formData)){
            $request->session()->flash('meg', 'Group Created Succesfully');
        }
        
        return redirect()->to('groups');
    }

    public function delete(Request $request,$id){
        if(Group::find($id)->delete()){
            $request->session()->flash('meg', 'Group Deleted Succesfully');
        }
        
        return redirect()->to('groups');
    }
}
