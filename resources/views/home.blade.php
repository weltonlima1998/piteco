<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<x-layout>
    <div class="container">
        <h1>{{ $data }}</h1>
        <div class="card">
            <div class="pizza">
                <canvas id="myChart"></canvas>
            </div>
            <div class="legenda_pizza">
                <div class="">
                    <button value="{{ $entrada }}" id="entrada">R$ {{ $entrada }}</button>
                    <label for="">Entrada</label>
                </div>
                <div>
                    <button value="{{ $saida }}" id="saida">R$ {{ $saida }}</button>
                    <label for="">Saida</label>
                </div>
            </div>
            <h2 class="porcentagem">{{ $porcentagem }}%</h2>
        </div>
    </div>
</x-layout>
