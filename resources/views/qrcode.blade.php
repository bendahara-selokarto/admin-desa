<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>    
</head>
<body>
    <div class="container">
        <div class="row">       
            @foreach ( $data as $v)            
            <div class="col-sm">             
                <p>{{ $v[0] }}</p>
                <img src="data:image/svg;base64, '{{ $v[1] }}' ">
                <p>{{ $v[2] }}</p>
            </div>
                @endforeach
            </div>
    </body>
</html>
