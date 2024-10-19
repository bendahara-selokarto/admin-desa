<div>
    @foreach ($data as $i)
    <ul>
        <li>{{ $i->rekening }}</li><p>{{ $i->nama }}</p>
        <p>{{ Terbilang::make(221234) }}</p>
    </ul>
        
    @endforeach
</div>
