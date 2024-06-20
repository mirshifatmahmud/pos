<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::all();
        return view('users.users',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->data['groupList'] = Group::arrayForGroupList();
        $this->data['mode'] = 'create';
        $this->data['headLine'] = 'Add New User';

        return view('users.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $formData = $request->all();

        if(User::create($formData)){
            Session::flash('meg','User Created Succesfully');
        }

        return redirect()->to('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['user'] = User::find($id);

        return view('users.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['user'] = User::find($id);
        $this->data['groupList'] = Group::arrayForGroupList();
        $this->data['mode'] = 'edit';
        $this->data['headLine'] = 'Update Information';

        return view('users.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $formData = $request->all();
        $user = User::find($id);

        $user->group_id = $formData['group_id'];
        $user->name = $formData['name'];
        $user->email = $formData['email'];
        $user->phone = $formData['phone'];
        $user->address = $formData['address'];

        // if($user->save()){
        //     Session::flash('meg','User Updated Succesfully');
        // }

        return redirect()->to('user')->with('meg','User Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find($id)->delete()){
            Session::flash('meg','User Deleted Succesfully');
        }

        return redirect()->to('user');
    }
}
