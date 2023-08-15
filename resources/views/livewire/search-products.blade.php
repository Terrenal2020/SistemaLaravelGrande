<div>
    <ul class="list-group">
        @foreach ($productos as $producto)
            <li class="list-group-item">{{ $producto->nombre }}</li>
        @endforeach
    </ul>
</div>


