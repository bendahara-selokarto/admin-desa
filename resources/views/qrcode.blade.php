<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
    <div class="container">
        <div class="row">
            @foreach ( $simple as $s)            
            <div class="col-sm">
                <p class="mb-0">{{  $s[0] }}</p>
                <p class="mb-0">{{  $s[2] }}</p>
                <img src="data:image/png;base64, {!! base64_encode( $s[1] ) !!} ">
            </div>
                @endforeach
            </div>
      
      
</body>
</html>
