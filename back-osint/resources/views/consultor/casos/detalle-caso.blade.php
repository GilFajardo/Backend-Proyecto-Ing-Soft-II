<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Caso - Consultor</title>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .navbar h1 { font-size: 22px; }

        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .case-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .case-card h2 { color: #444; margin-bottom: 10px; }

        .case-info p {
            margin: 6px 0;
            color: #555;
            font-size: 15px;
        }

        .options-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
        }

        .option-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform .2s;
            text-align: center;
        }

        .option-card:hover { transform: scale(1.03); }

        .option-card h3 {
            margin-bottom: 10px;
            color: #667eea;
        }

        .btn-back {
            margin-top: 25px;
            display: inline-block;
            padding: 10px 20px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background .3s;
        }

        .btn-back:hover { background: #5567d9; }
    </style>
</head>

<body>

    <nav class="navbar">
        <h1>Detalle del Caso</h1>
        <span id="userSession"></span>
    </nav>

    <div class="container">

        <div class="case-card">
            <h2 id="nombreCaso">Cargando...</h2>

            <div class="case-info">
                <p><strong>ID:</strong> <span id="idCaso"></span></p>
                <p><strong>Tipo:</strong> <span id="tipoCaso"></span></p>
                <p><strong>Estado:</strong> <span id="estadoCaso"></span></p>
                <p><strong>Creador:</strong> <span id="creadorCaso"></span></p>
                <p><strong>Descripción:</strong> <span id="descripcionCaso"></span></p>
                <p><strong>Fecha creación:</strong> <span id="fechaCreacion"></span></p>
                <p><strong>Fecha actualización:</strong> <span id="fechaActualizacion"></span></p>
            </div>
        </div>

        <div class="options-grid">
            <div class="option-card" onclick="verUsuariosAsignados()">
                <h3>Usuarios asignados</h3>
                <p>Consultar participantes del caso.</p>
            </div>

            <div class="option-card" onclick="verEvidencias()">
                <h3>Evidencias del caso</h3>
                <p>Ver archivos y registros adjuntos.</p>
            </div>

            <div class="option-card" onclick="verHistorial()">
                <h3>Historial del caso</h3>
                <p>Movimientos y acciones realizadas.</p>
            </div>
        </div>

        <a href="/consultor/casos/lista-casos" class="btn-back">← Volver a Casos</a>

    </div>

<script>

    const params = new URLSearchParams(window.location.search);
    const casoId = params.get("id");

    if (!casoId) {
        alert("No se proporcionó ID del caso");
        window.location.href = "/consultor/casos/lista-casos";
    }


    // VALIDACIÓN DE SESIÓN Y ROL
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

        document.getElementById("userSession").textContent = usuario.nombre;

        cargarCaso();
    });


    async function cargarCaso() {
        try {
            const token = localStorage.getItem("token");

            const response = await fetch(`{{ url('/api/consultor/casos') }}/${casoId}`, {
                headers: {
                    "Authorization": "Bearer " + token,
                    "Content-Type": "application/json"
                }
            });

            const data = await response.json();

            if (!data.success) {
                alert("No se pudo cargar la información del caso");
                return;
            }

            const c = data.caso;

            document.getElementById("idCaso").textContent = c.id_caso;
            document.getElementById("nombreCaso").textContent = c.nombre;
            document.getElementById("tipoCaso").textContent = c.tipo_caso;
            document.getElementById("estadoCaso").textContent = c.estado;
            document.getElementById("descripcionCaso").textContent = c.descripcion;
            document.getElementById("fechaCreacion").textContent = c.fecha_creacion;
            document.getElementById("fechaActualizacion").textContent = c.fecha_actualizacion ?? "Sin cambios";

            document.getElementById("creadorCaso").textContent =
                c.creador ? c.creador.nombre : "Desconocido";

        } catch (e) {
            console.error(e);
            alert("Error al conectar con el servidor");
        }
    }


    function verUsuariosAsignados() {
        window.location.href = `/consultor/casos/usuarios-asignados?id=${casoId}`;
    }

    function verEvidencias() {
        window.location.href = `/consultor/evidencias/evidencias-caso?id=${casoId}`;
    }

    function verHistorial() {
        window.location.href = `/consultor/acciones/historial-caso?id=${casoId}`;
    }

</script>

</body>
</html>
