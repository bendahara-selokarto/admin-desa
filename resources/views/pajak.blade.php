<div>
    @foreach ($data as $i)
    <ul>
        <li>{{ $i->kwitansi }}</li><p>{{ Terbilang::make($i->jumlah) }}</p>
    </ul>
        {{ Terbilang::make(100000) }}
    @endforeach
</div>
