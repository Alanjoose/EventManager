<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->name = $request->name;
        $event->descripton = $request->description;
        $event->locale = $request->locale;
        $event->date = $request->date;
        $event->user_id = Auth::user()->id;
        $event->save();

        return redirect('dashboard')->with('msg', 'Evento Criado Com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
       return view('events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->name = $request->name;
        $event->descripton = $request->description;
        $event->locale = $request->locale;
        $event->date = $request->date;
        $event->update();

        return redirect('dashboard')->with('msg', 'Evento Atualizado Com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect('dashboard')->with('msg', 'Evento Excluído Com Sucesso!');
    }

   public function joinInEvent($id)
   {
    $user = Auth::user();
    $user->eventsAsParticipant()->attach($id);
    $event = Event::findOrFail($id);
    
    return redirect('dashboard')->with('msg', 'Presença confirmada do evento ' . $event->name . ' com sucesso!');
   }

   public function leaveEvent($id)
   {
    $user = Auth::user();
    $user->eventsAsParticipant()->detach($id);
    $event = Event::findOrFail($id);
    return redirect('events/participant')->with('msg', 'Presença removida do evento ' . $event->name . ' com sucesso!');
   }
}
