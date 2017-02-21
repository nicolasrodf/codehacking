<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = User::all();

        return view('admin.users.index', compact('users')); //segun php artisan route:list. Va al index de la carpeta admin/users
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles = Role::lists('name', 'id')->all(); //mostrará una lista en el formulario, con valor "id" y nombre "name".

        return view('admin.users.create', compact('roles')); //variable roles se usará en admin\users\create.blade


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request) //UsersRequest se creó con php artisan make:request UsersRequest
    {                                            //el objetivo es que en ese Request, se ponen reglas obligatorias.
        //
        //return $request->all();
        //User::create($request->all());
//        return redirect('/admin/users');

        $input = $request->all(); //almaceno_todo lo ingresado

        if($file = $request->file('photo_id')){ //si existe algo en file

            $name = time() . $file->getClientOriginalName(); //obtener su nombre

            $file->move('images', $name); //mover su nombre a carpeta images de wamp

            //crear registro en photos
            $photo = Photo::create(['file'=>$name]); //crear una nueva foto  con el nombre del archivo
            $input['photo_id'] = $photo->id; //almacenar  su id en la entrada de datos para mas adelante ingresar a BBDD

        }

        $input['password'] = bcrypt($request->password); //encriptar pass

        User::create($input); //crear la entrada de datos completa en la BBDD



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
        return view('admin.users.edit');
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
