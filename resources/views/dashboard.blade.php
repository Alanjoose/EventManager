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
                        <div class="col">
                            <h2>Eventos</h2>
                        </div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col">
                            <a href="{{route('events/create')}}" class="btn btn-warning">Criar Evento</a>
                        </div>
                    </div>

                    <div class="container-fluid">
                        @foreach ($events as $event)
                            <div class="container">
                                <h4>{{$event->name}}</h4>
                                <p>{{$event->description}}</p>
                                <h5>{{$event->locale}}</h5>
                                <span>{{$event->date}}</span>
                                <div class="row">
                                    <a href="#" class="btn btn-warning">Participar</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
