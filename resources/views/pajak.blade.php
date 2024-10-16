<div>
    @foreach ($data as $i)
    <ul>
        <li>{{ $i->kwitansi }}</li><p>{{ $i->jumlah }}</p>
    </ul>
        {{ Number::forHumans(100000) }}
    @endforeach
</div>
