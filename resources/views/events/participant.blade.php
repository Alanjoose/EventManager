<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row d-flex flex-row justify-content-space-evently align-middle">
                        @if(@session('msg'))
                        <div class="alert" style="background: rgba(0, 255, 0, .7)">
                            {{@session('msg')}}
                        </div>
                        @endif
                        <div class="col">
                            <h2>Eventos que participo</h2>
                        </div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                    </div>

                    <div class="container-fluid">
                        @foreach ($eventsAsParticipant as $event)
                            <div class="container">
                                <h4>{{$event->name}}</h4>
                                <p>{{$event->description}}</p>
                                <h5>{{$event->locale}}</h5>
                                <span>{{$event->date}}</span>
                                <div class="row">
                                    <form action="{{route('events/leave', $event->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Remover participação</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
