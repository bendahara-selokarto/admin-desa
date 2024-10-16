<div>
    @foreach ($data as $i)
    <ul>
        <li>{{ $i->rekening }}</li><p>{{ $i->nama }}</p>
    </ul>
        
    @endforeach
</div>
