<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreForm;
use App\Models\User;
use App\Models\Reseller;
use App\Models\Supplier;
use App\Models\UserImage;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UserStoreForm $user)
    {
        $user->validated();
        if($request->hasfile('profile_image')) {
            $file = $request->file('profile_image');
            $extenstion = $file->getClientOriginalExtension();
            $file_original_name = $file->getClientOriginalName();
            $file_size =  $request->file('profile_image')->getSize();
            $file_name = time().'.'.$extenstion;
            $file_path = $file->storeAs('Profile', $file_name);
        }


        if($request->role=="supplier") {
            $supplier = Supplier::create([
              'address' => $request->address,
              'contact_no' => $request->contact_no,
            ]);
        }else {
            $reseller =  Reseller::create([
                'address' => $request->address,
                'contact_no' => $request->contact_no,
            ]);
        }

        $role_id  = isset($supplier->id) ? $supplier->id: $reseller->id;

        $user_data= [
            "name" => $request->name,
            "email" => $request->email,
            "role_type" => $request->role,
            "role_id" => $role_id,
        ];

        $user =  User::create($user_data);

        if($user) {
            $user_image= [
                "user_id" => $user->id,
                "file_original_name" => $file_original_name,
                "file_name" =>  $file_name,
                "file_size" =>  $file_size,
                "extenstion" => $extenstion,
            ];

            UserImage::create($user_image);
        }

        return redirect()->route("users.index")->with('message','Record inserted Sucessfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
