<x-layout>
    <div class="container">
        <h1>gerenciar</h1>
        <div class="card">
            <ul class="extrado">
                @foreach ($categorias as $categoria)
                    <li>
                        <p class="data">{{ $loop->iteration }}</p>
                        <p class="categoria">{{ $categoria->name }}</p>
                        <p class="valor">17 maio</p>
                        <a href="#">
                            <img src="{{ asset('/assets/img/icons/excluir.png') }}" alt="">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layout>
