<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grado;
use App\Models\Profeso;
use App\Models\ProfesoGrado;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PofesorController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/profe/home'; //Redirect after authenticate

    public function __construct()
    {
        $this->middleware('guest:profe')->except('logout'); //Notice this middleware
    }

    public function showLoginForm() //Go web.php then you will find this route
    {
        return view('profesor.login');
    }

    public function login(Request $request) //Go web.php then you will find this route
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $this->guard('profe')->logout();

        $request->session()->invalidate();

        return redirect('/profe/login');
    }

    protected function guard() // And now finally this is our custom guard name
    {
        return Auth::guard('profe');
    }


    // end login 
    public function index()
    {
        $data = Profeso::all();
        return view('escuela.profesor.index', compact('data'));
    }

    public function create()
    {
        return view('escuela.profesor.create');
    }

    public function store(Request $request)
    {
        Profeso::create([
            'puesto' => $request->puesto,
            'cursos' => $request->cursos,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->contrasena),

        ]);
        return back()->with(['info' => 'profesor guardado']);
    }
    public function update(Request $request, $id)
    {
        Profeso::find($id)->update($request->all());
        return back()->with(['info' => 'profesor guardado']);
    }
    public function show($id)
    {
        $g = Profeso::find($id);

        $grados = ProfesoGrado::where('profesor_id', $id)->get();
        return view('escuela.profesor.show', compact('g', 'grados'));
    }
    public function delete($id)
    {
        $g = Profeso::find($id)->delete();
        return back()->with(['info' => 'profesor eliminado']);
    }


    // retorna la vista para asignar un profesro a un grado
    public function grado_profesor_view()
    {
        $grado = Grado::all();
        $profesor = Profeso::all();

        return view('escuela.profesor.asignar_grado', compact('profesor', 'grado'));
    }

    // relaciona el grado con el profesor
    public function grado_profesor(Request $request)
    {
        ProfesoGrado::create($request->all());
        return back()->with(['info' => 'profesor guardado al grado']);
    }

    public function homeProfe()
    {
        return view('profesor.home');
    }
}
