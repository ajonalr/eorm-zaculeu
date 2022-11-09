<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grado;
use App\Models\MateriaGrado;
use App\Models\Profeso;
use App\Models\ProfesoGrado;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PofesorController extends Controller
{

    public function login()
    {
        return view('profesor.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $profe = Profeso::where('email', $request->email)->first();

        if ($profe->password === $request->password) {

            session(['profe_id' => $profe->id]);
            session(['profe' => $profe]);

            return redirect(route('profe.home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $request->session()->flush();

        return redirect('/');
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
            'password' => $request->contrasena,

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
        // TODO: NUTRIRI CON INFORMACION DEL PROFESOR

        $fata = MateriaGrado::where('profesor_id', session()->get('profe_id'))
            ->get();
        return view('profesor.home', compact('fata'));
    }

    public function calificar()
    {
        return view('profesor.calificar');
    }

    // retorna los grados asignados a un profesor
    public function getGradoProfe($grado_id, $profe_id)
    {
        $grado = Grado::find($grado_id);
        // materias de profesor 
        $materias =
            MateriaGrado::where('profesor_id', $profe_id)
            ->where('grado_id', $grado_id)
            ->get();

        // return view('profesor.showgrado', ['grados' => $grado, 'materias' => $materias]);
        return view('profesor.showgrado', compact('grado', 'materias'));
    }

    public function reporte()
    {
        $data = Profeso::all();
        return view('escuela.profesor.reporte', compact('data'));
    }
}
