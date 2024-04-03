<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
//import file store user request
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //request dipakai untuk searching
    public function index(Request $request)
    {
        //ketika searching, akan pilih namanya, ambil data dari DB
        $users = DB::table('users')
            ->when($request->input('name'), function($query, $name) {
                return $query->where('name', 'like', '%'.$name.'%');
            })
            ->select('id', 'name', 'email', 'phone', DB::raw('DATE_FORMAT(created_at, "%d %M %Y") as created_at'))
            ->orderBy('id', 'DESC') //data terbaru di paling atas, urutkan data
            ->paginate(10); //muncul 10 data di setiap page

        //compact (utk panggil nama variable users ambil data dari db)
        return view('pages.users.index', compact('users'));
    }

    public function create() {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //tambah data pakai create
        User::create([
            'name' => $request['name'], //dari field form name
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'roles' => $request['roles'],
            'phone' => $request['phone'],
            'address' => $request['address']
        ]);

        return redirect(route('user.index'))->with('success', 'user baru berhasil ditambahkan');
    }

    public function edit(User $user) {

        return view('pages.users.edit')->with('user', $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    //user, membutuhkan data ke tabel user
    public function update(UpdateUserRequest $request, User $user)
    {
        //request dari update user request
        $validate = $request->validated(); //kalau tervalidasi update
        $user->update($validate); //utk ubah data dari request user

        return redirect()->route('user.index')->with('success', 'Sukses Edit User');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        //sukses dari nama alertnya
        return redirect()->route('user.index')->with('success', 'Sukses Hapus User');
    }
}
