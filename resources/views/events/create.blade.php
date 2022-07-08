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
                   <h2>Criar Evento</h2>

                   <form action="{{route('events/store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nome do Evento:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="form-group">
                      <label for="description">Descrição do Evento:</label>
                      <textarea name="description" class="form-control" id="description" rows="2"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="locale">Local do Evento:</label>
                        <input type="text" class="form-control" name="locale" id="locale" required>
                    </div>

                    <div class="form-group">
                        <label for="date">Data do Evento:</label>
                        <input type="date" class="form-control" name="date" id="date" min="08-07-2022" required>
                    </div>

                      <button type="submit" class="btn btn-warning">Criar evento</button>

                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
