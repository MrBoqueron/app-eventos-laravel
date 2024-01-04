<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eventos;

class EventosController extends Controller
{

    public function index()
    {
        return view('Eventos.eventos');
    }

    public function tusEventos()
    {
        $eventos = Eventos::where('user_id', auth()->user()->id)->get();
        return view('Eventos.tusEventos', compact('eventos'));
    }

    public function crearEvento()
    {
        return view('Eventos.crearEvento');
    }

    public function guardarEvento(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'lugar' => 'required',
            'imagen' => 'required',
        ]);

        $evento = new Eventos();
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
        $evento->lugar = $request->lugar;
        $imagen = $request->file('imagen');
        $imagen->storeAs('public/eventos', $request->file('imagen')->getClientOriginalName());
        $evento->imagen = $imagen->getClientOriginalName();
        $evento->user_id = auth()->user()->id;
        $evento->save();

        return redirect()->route('eventos');
    }

    public function verEvento($id)
    {
        $evento = Eventos::find($id);
        return view('Eventos.verEvento', compact('evento'));
    }

    public function editarEvento($id)
    {
        $evento = Eventos::find($id);
        return view('Eventos.editarEvento', compact('evento'));
    }

    public function actualizarEvento(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'lugar' => 'required',
            'imagen' => 'required',
        ]);

        $evento = Eventos::find($id);
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
        $evento->lugar = $request->lugar;
        $imagen = $request->file('imagen');
        $imagen->storeAs('public/eventos', $request->file('imagen')->getClientOriginalName());
        $evento->imagen = $imagen->getClientOriginalName();
        $evento->user_id = auth()->user()->id;
        $evento->save();

        return redirect()->route('tusEventos');
    }

    public function eliminarEvento($id)
    {
        $evento = Eventos::find($id);
        // $imagen = $evento->imagen;
        // $path = public_path() . '/storage/eventos/' . $imagen;
        // unlink($path);
        $evento->delete();
        return redirect()->route('tusEventos');
    }
}
