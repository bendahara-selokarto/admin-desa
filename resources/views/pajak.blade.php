<div>
    @foreach ($data as $i)
    <ul>
        <li>{{ $i->kwitansi }}</li><p>{{ $i->jumlah }}</p>
    </ul>
        
    @endforeach
</div>
