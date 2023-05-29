<!DOCTYPE html>
<html>
<head>
    <title>Página con fondo negro</title>
    <style>
        body {
            background-color: black;
            overflow: hidden;
        }
        
        #logo {
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 200px;
        }
        
        #pokeball {
            position: fixed;
            top: 28%;
            left: 35%;
            transform: translate(-50%, -50%);
            width: 25px;
            height: 25px;
        }
        
        #pokeball a {
            display: block;
            width: 50%;
            height: 50%;
        }
        
        #consultar {
            position: fixed;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        #consultar a {
            display: inline-block;
            background-color: red;
            color: white;
            font-size: 20px;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(255, 255, 255, 0.5), 0px 2px 10px rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>
    <img id="logo" src="pokemon.png" alt="Logo Flotante">
    <div id="pokeball">
        <a href="estructura.php">
            <img src="pokeball.png" alt="Pokeball">
        </a>
    </div>
    <div id="consultar">
        <a href="menuPrincipal.php">Consultar!</a>
    </div>
</body>
</html>