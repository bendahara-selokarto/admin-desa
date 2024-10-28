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
                <table>
                    <row>
                        <col> 
                        <ul>
                            <li><p>{{ $v[0] }}</li>
                                <li>{{ $v[2] }}</li>
                            <li><p>{{ $v[3] }}</p></li>
                            <li><p>{{ $v[4] }}</p></li>
                        </ul>
                        <col><img src="data:image/svg;base64, '{{ $v[1] }}' ">
                       
                        
                        
                    </row>
                </table>            
               
                
                
            </div>
                @endforeach
            </div>
    </body>
</html>
