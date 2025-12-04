<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Usuario - Consultor</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            margin: 0;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            font-size: 22px;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .campo {
            margin-bottom: 15px;
        }

        .campo label {
            font-weight: bold;
            color: #555;
        }

        .campo span {
            display: block;
            color: #111;
        }

        .btn-volver {
            margin-top: 25px;
            background: #667eea;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }

        .btn-volver:hover {
            background: #5568d8;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <h1>Sistema OSINT - Consultor</h1>
        <span id="userName">Usuario</span>
    </nav>

    <div class="container">
        <h2>Detalle del Usuario</h2>

        <div class="campo">
            <label>Nombre:</label>
            <span id="nombre"></span>
        </div>

        <div class="campo">
            <label>Usuario:</label>
            <span id="usuario"></span>
        </div>

        <div class="campo">
            <label>Email:</label>
            <span id="mail"></span>
        </div>

        <div class="campo">
            <label>Rol:</label>
            <span id="rol"></span>
        </div>

        <button class="btn-volver" onclick="volver()">Volver</button>
    </div>

<script>
    // Obtener parámetros de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const idUsuario = urlParams.get("id");

    // VALIDAR SESIÓN Y ROL
    window.addEventListener("load", () => {
        const usuario = JSON.parse(localStorage.getItem("usuario"));
        const token = localStorage.getItem("token");

        if (!token || !usuario) {
            return window.location.href = "/login.html";
        }

        if (usuario.rol !== "consultor") {
            alert("Acceso denegado: Esta página es solo para consultores.");
            return window.location.href = "/login.html";
        }

        document.getElementById("userName").textContent = usuario.nombre;

        cargarDetalle();
    });

    // ============================
    //     CARGAR DETALLE
    // ============================

    function cargarDetalle() {

        fetch(`{{ url('/api/usuarios/') }}/${idUsuario}`, {
            headers: {
                "Authorization": "Bearer " + localStorage.getItem("token"),
                "Content-Type": "application/json"
            }
        })
        .then(r => r.json())
        .then(data => {
            if (data.error) {
                alert("Usuario no encontrado");
                return;
            }

            document.getElementById("nombre").textContent = data.nombre;
            document.getElementById("usuario").textContent = data.usuario;
            document.getElementById("mail").textContent = data.mail;
            document.getElementById("rol").textContent = data.rol;
        })
        .catch(err => {
            alert("Error al cargar detalle");
            console.error(err);
        });
    }

    function volver() {
        window.location.href = "/consultor/usuarios/lista-usuarios";
    }
</script>

</body>
</html>
