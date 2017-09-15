<!doctype html>
<html>
    <head> 
        <title>BLog</title>
         <!-- Compiled and minified CSS -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
        <link rel="stylesheet" href="/css/estilos.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <style>
            body {display: flex;min-height: 100vh;flex-direction: column;}
            main {flex: 1 0 auto;}
/*
            #publicaciones a{font-size: 20px;color: #e06060;}
            #publicaciones a:hover{color: #ff003b;font-weight: bold;}
*/
        </style>
    </head>
    <body>
        
        <header>
            <!--NavBar Fijo-->
            @include('layouts.nav')
        </header>
        
        <main>
            <!--Contenido Variable-->
            <div class="container">
                @yield('content')
            </div>
        </main>
        
        
        <footer>
            <!--Footer-->
            @include('layouts.footer')
        </footer>
        
        
        
    </body>
</html>

