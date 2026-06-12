<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Agendamento</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Agendamento de Serviços</h2>
        <p class="text-sm text-gray-500 text-center mb-6">Profissional selecionado: ID #{{ $profissionalId }}</p>

        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-3 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">1. Escolha o Dia:</label>
            <input type="date" id="seletor-data" value="{{ $dataSelecionada }}" min="{{ date('Y-m-d') }}"
                   class="w-full border border-gray-300 p-2.5 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        <form action="{{ route('agendamento.salvar') }}" method="POST" class="space-y-5">
            @csrf
            <input type="hidden" name="profissional_id" value="{{ $profissionalId }}">

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">2. Seu Nome:</label>
                <input type="text" name="cliente_nome" required placeholder="Digite seu nome completo"
                       class="w-full border border-gray-300 p-2.5 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">3. Escolha o Horário Disponível:</label>
                @if(count($horariosDisponiveis) > 0)
                    <div class="grid grid-cols-3 gap-2">
                        @foreach($horariosDisponiveis as $horario)
                            <label class="cursor-pointer">
                                <input type="radio" name="data_hora" value="{{ $horario['valor_banco'] }}" required class="peer sr-only">
                                <div class="text-center p-2.5 bg-white border border-gray-200 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-indigo-600 peer-checked:text-white peer-checked:border-indigo-600 hover:bg-gray-50 transition">
                                    {{ $horario['exibicao'] }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-amber-600 bg-amber-50 p-3 rounded-lg text-center">Nenhum horário disponível para a data selecionada.</p>
                @endif
            </div>

            <button type="submit" @if(count($horariosDisponiveis) == 0) disabled @endif
                    class="w-full bg-indigo-600 text-white font-semibold py-3 px-4 rounded-lg hover:bg-indigo-700 disabled:bg-gray-300 disabled:cursor-not-allowed transition duration-200 shadow-md">
                Confirmar Agendamento
            </button>
        </form>
    </div>

    <script>
        document.getElementById('seletor-data').addEventListener('change', function() {
            const data = this.value;
            window.location.search = `?data=${data}`;
        });
    </script>
</body>
</html>