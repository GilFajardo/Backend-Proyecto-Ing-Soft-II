<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>UDINIT Dashboard</title>

  <!-- CSS global y de componentes -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/index.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/dashboard/navbar/navbar.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/dashboard/sidebars/sidebars.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/dashboard/main-content/main-content.css') }}" />
</head>
<body>
  <!-- NAVBAR -->
  <header class="navbar">
    <div class="navbar-inner app-max-width">
      <div class="navbar-left">
        <div class="navbar-logo">
          <span class="navbar-logo-mark">U</span>
          <span class="navbar-logo-text">UDINIT</span>
        </div>

        <div class="navbar-search">
          <span class="navbar-search-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24">
              <path d="M10 2a8 8 0 1 1-5.3 14l-3.1 3.1-1.4-1.4 3.1-3.1A8 8 0 0 1 10 2Zm0 2a6 6 0 1 0 0 12 6 6 0 0 0 0-12Z" />
            </svg>
          </span>
          <input
            type="search"
            placeholder="Search incidents, users, IPs..."
            aria-label="Buscar"
          />
        </div>
      </div>

      <nav class="navbar-center" aria-label="Navegación principal">
        <button class="navbar-icon-btn active" type="button" aria-label="Home">
          <svg viewBox="0 0 24 24">
            <path d="M3 10.5 12 3l9 7.5V21h-7v-5h-4v5H3Z" />
          </svg>
        </button>

        <button class="navbar-icon-btn" type="button" aria-label="Portafolio" id="btnBitacora">
          <svg viewBox="0 0 24 24">
            <path d="M9 3V2h6v1h4a2 2 0 0 1 2 2v4H3V5a2 2 0 0 1 2-2h4Zm12 7H3v9a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-9Z" />
          </svg>
        </button>

        <button class="navbar-icon-btn" type="button" aria-label="Personas">
          <svg viewBox="0 0 24 24">
            <path d="M8 11a3 3 0 1 1 3-3 3 3 0 0 1-3 3Zm8 0a3 3 0 1 1 3-3 3 3 0 0 1-3 3ZM8 13a4 4 0 0 0-4 4v2h8v-2a4 4 0 0 0-4-4Zm8 0a4 4 0 0 0-4 4v2h8v-2a4 4 0 0 0-4-4Z" />
          </svg>
        </button>

        <button class="navbar-icon-btn" type="button" aria-label="Huella">
          <svg viewBox="0 0 24 24">
            <path d="M12 2a7 7 0 0 0-7 7v1h2V9a5 5 0 0 1 10 0 16 16 0 0 1-3 9.64L12 22l-2-1.36A18 18 0 0 0 7 9H5a20 20 0 0 0 4 13l3 2 3-2A18 18 0 0 0 19 9a7 7 0 0 0-7-7Z" />
          </svg>
        </button>
      </nav>

      <div class="navbar-right">
        <button class="navbar-icon-btn" type="button" aria-label="Notificaciones">
          <svg viewBox="0 0 24 24">
            <path d="M12 22a2 2 0 0 0 2-2h-4a2 2 0 0 0 2 2Zm6-6V11a6 6 0 0 0-5-5.91V4a1 1 0 0 0-2 0v1.09A6 6 0 0 0 6 11v5l-2 2v1h16v-1Z" />
          </svg>
        </button>

        <div class="navbar-user">
          <button
            class="navbar-user-trigger"
            id="userMenuToggle"
            type="button"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <span class="navbar-user-avatar">
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12 2a5 5 0 0 1 5 5v1a5 5 0 0 1-10 0V7a5 5 0 0 1 5-5Zm0 11a3 3 0 0 0 3-3V7a3 3 0 0 0-6 0v3a3 3 0 0 0 3 3Zm0 2c3.31 0 6 2.02 6 4.5V21h-2v-1.5c0-1.41-1.79-2.5-4-2.5s-4 1.09-4 2.5V21H6v-1.5C6 17.02 8.69 15 12 15Z" />
              </svg>
            </span>
            <span class="navbar-user-chevron">▾</span>
          </button>

          <div class="navbar-user-menu" id="userMenu">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="navbar-user-item" type="submit">
                <span class="navbar-user-item-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                    <path d="M11 2h2v10h-2V2Zm-4.64 2.64 1.41 1.41A6 6 0 1 0 18 10a5.94 5.94 0 0 0-1.77-4.24l1.41-1.41A8 8 0 1 1 6.36 4.64Z" />
                    </svg>
                </span>
                <span class="navbar-user-item-label">Salir</span>
                </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- LAYOUT: BARRAS LATERALES + CONTENIDO CENTRAL -->
  <div class="layout-wrapper">
    <div class="layout-shell app-max-width">
      <!-- BARRA LATERAL IZQUIERDA (UDINIT) -->
      <aside class="sidebar izquierda" id="sidebarIzquierda">
        <button
          class="sidebar-toggle sidebar-toggle-izquierda"
          type="button"
          aria-label="Ocultar barra izquierda"
        >
          &#x2039;
        </button>
        <div class="sidebar-content">
          <div class="sidebar-header">
            <div class="sidebar-title">UDINIT</div>
          </div>
          <nav class="sidebar-menu" aria-label="Fuentes de datos">
            <button class="sidebar-item" type="button">Email address</button>
            <button class="sidebar-item" type="button">Domain name</button>
            <button class="sidebar-item" type="button">IP &amp; MAC address</button>
            <button class="sidebar-item" type="button">Social networks</button>
            <button class="sidebar-item" type="button">Telephone numbers</button>
            <button class="sidebar-item" type="button">Geolocation</button>
            <button class="sidebar-item" type="button">Dark Web</button>
          </nav>
        </div>
      </aside>

      <!-- ZONA DE CONTENIDO CENTRAL (TU COMPONENTE PRINCIPAL) -->
      <main class="contenido-central">
        <div class="contenido-wrapper">
          <!-- SECCIÓN SUPERIOR: CASOS RECIENTES -->
          <section class="casos-section" aria-label="Casos recientes">
            <div class="casos-header">
              <div>
                <div class="casos-title">Casos recientes</div>
                <div class="casos-subtitle">
                  Desliza para explorar los incidentes activos y finalizados.
                </div>
              </div>
              <div class="casos-controles">
                <button class="casos-arrow" type="button" id="casosPrev" aria-label="Casos anteriores">
                  &#x2039;
                </button>
                <button class="casos-arrow" type="button" id="casosNext" aria-label="Casos siguientes">
                  &#x203A;
                </button>
              </div>
            </div>

            <div class="casos-slider" id="casosSlider">
              <div class="casos-track">
                @foreach($casos as $caso)
                <article class="caso-card">
                  <header class="caso-header">
                    <div class="estado-badge {{ $caso->estado == 'activo' ? 'estado-activo' : ($caso->estado == 'en_progreso' ? 'estado-progreso' : 'estado-finalizado') }}">
                      <div class="estado-icono"></div>
                      <span>{{ ucfirst($caso->estado) }}</span>
                    </div>
                  </header>
                  <div class="caso-body">
                    <p>{{ $caso->descripcion }}</p>
                  </div>
                  <footer class="caso-footer">
                    <span>CASE ID:</span> {{ $caso->codigo_caso ?? 'N/A' }}
                  </footer>
                </article>
                @endforeach
              </div>
            </div>
          </section>

          <!-- PANEL DE CONTROL -->
          <section class="panel-control" aria-label="Panel de control">
            <div class="panel-card">
              <button class="panel-item" type="button" id="btnAdmin">
                <span class="panel-icono">
                  <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M12 2a5 5 0 0 1 5 5v1a5 5 0 0 1-10 0V7a5 5 0 0 1 5-5Zm0 11a3 3 0 0 0 3-3V7a3 3 0 0 0-6 0v3a3 3 0 0 0 3 3Zm0 2c3.31 0 6 2.02 6 4.5V21h-2v-1.5c0-1.41-1.79-2.5-4-2.5s-4 1.09-4 2.5V21H6v-1.5C6 17.02 8.69 15 12 15Z" />
                  </svg>
                </span>
                <span>Admin</span>
              </button>

              <button class="panel-item" type="button" id="btnNewCase">
                <span class="panel-icono plus">
                  <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2Zm1 11h3v-2h-3V8h-2v3H8v2h3v3h2Z" />
                  </svg>
                </span>
                <span>New case</span>
              </button>

              <button class="panel-item" type="button" id="btnNewUser">
                <span class="panel-icono panel-icono-user-new">
                  <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M15 12a4 4 0 1 0-4-4 4.003 4.003 0 0 0 4 4Zm0-6a2 2 0 1 1-2 2 2.003 2.003 0 0 1 2-2ZM8 13a4 4 0 1 0-4-4 4.003 4.003 0 0 0 4 4Zm0-6a2 2 0 1 1-2 2 2.003 2.003 0 0 1 2-2Zm7 7a5.99 5.99 0 0 0-4.78 2.39A6.99 6.99 0 0 1 2.062 15 4.987 4.987 0 0 1 8 12h2.1a6.97 6.97 0 0 0 4.9 2Zm0 2a5 5 0 0 0-5 5h2a3 3 0 0 1 6 0h2a5 5 0 0 0-5-5Z" />
                  </svg>
                </span>
                <span>New user</span>
              </button>

              <button class="panel-item" type="button" id="btnEvidence">
                <span class="panel-icono panel-icono-evidence">
                  <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M10 2a6 6 0 0 1 4.8 9.6l4.8 4.8-1.4 1.4-4.8-4.8A6 6 0 1 1 10 2Zm0 2a4 4 0 1 0 4 4 4.005 4.005 0 0 0-4-4Z" />
                  </svg>
                </span>
                <span>Evidence</span>
              </button>

              <button class="panel-item" type="button" id="btnReport">
                <span class="panel-icono panel-icono-report">
                  <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M6 2h9l5 5v13a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2Zm0 2v16h12V9h-5V4H6Zm7 0v3h3Z" />
                  </svg>
                </span>
                <span>Report</span>
              </button>

              <button class="panel-item" type="button">
                <span class="panel-icono panel-icono-tools">
                  <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M21.6 7.2 18 10.8l-2.8-.7-.7-2.8 3.6-3.6a4.5 4.5 0 0 0-5.7 5.7L5 17.4V21h3.6l7.4-7.4a4.5 4.5 0 0 0 5.6-6.4Z" />
                  </svg>
                </span>
                <span>Tools</span>
              </button>
            </div>
          </section>

          <!-- PANEL DE USUARIO -->
          <section class="usuario-section" aria-label="Actividad reciente de usuario">
            <div class="usuario-card">
              <div class="usuario-top">
                <div class="usuario-main">
                  <div class="usuario-avatar">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                      <path d="M12 2a5 5 0 0 1 5 5v1a5 5 0 0 1-10 0V7a5 5 0 0 1 5-5Zm0 11a3 3 0 0 0 3-3V7a3 3 0 0 0-6 0v3a3 3 0 0 0 3 3Zm0 2c3.31 0 6 2.02 6 4.5V21h-2v-1.5c0-1.41-1.79-2.5-4-2.5s-4 1.09-4 2.5V21H6v-1.5C6 17.02 8.69 15 12 15Z" />
                    </svg>
                  </div>
                  <div class="usuario-textos">
                    <div class="usuario-nombre">{{ Auth::user()->nombre }}</div>
                    <div class="usuario-tiempo">Online</div>
                  </div>
                </div>

                <div class="usuario-email">
                  <div class="usuario-email-icono">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                      <path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Zm0 2v.51l8 5.33 8-5.33V6H4Zm16 2.49-7.44 4.96a2 2 0 0 1-2.12 0L3 8.49V18h17Z" />
                    </svg>
                  </div>
                  <span>{{ Auth::user()->mail }}</span>
                </div>
              </div>

              <div class="usuario-bottom">
                <span>New Tool: </span>
                <a href="https://haveibeenpwned.com/" target="_blank" rel="noopener noreferrer">
                  https://haveibeenpwned.com/
                </a>
              </div>
            </div>
          </section>
        </div>
      </main>

      <!-- BARRA LATERAL DERECHA (TOOLS) -->
      <aside class="sidebar derecha" id="sidebarDerecha">
        <button
          class="sidebar-toggle sidebar-toggle-derecha"
          type="button"
          aria-label="Ocultar barra derecha"
        >
          &#x203A;
        </button>
        <div class="sidebar-content">
          <div class="sidebar-header">
            <div class="sidebar-title">TOOLS</div>
          </div>
          <nav class="sidebar-menu" aria-label="Herramientas">
            @foreach($herramientas as $herramienta)
            <button class="sidebar-item" type="button">{{ $herramienta->nombre }}</button>
            @endforeach
          </nav>
        </div>
      </aside>
    </div>
  </div>

  <!-- MODAL EDITAR CASO -->
  <div class="modal-overlay" id="modalEditarCaso" style="z-index: 1100;">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalEditarCasoTitulo">
      <div class="modal-header">
        <div class="modal-title" id="modalEditarCasoTitulo" style="color: #0f172a;">Editar caso</div>
        <span class="badge-estado-modal" id="badgeEstadoActual" style="color: #334155; border-color: #cbd5e1;"></span>
        <button class="modal-close" type="button" data-modal-close style="color: #64748b;">&times;</button>
      </div>
      <div class="modal-body">
        <div class="campo">
          <label for="campoEstado">Estado</label>
          <select id="campoEstado">
            <option value="Activo">Activo</option>
            <option value="En Progreso">En Progreso</option>
            <option value="Pausado">Pausado</option>
            <option value="Cerrado">Cerrado</option>
          </select>
        </div>

        <div class="campo">
          <label for="campoId">CASE ID</label>
          <input type="text" id="campoId" readonly />
        </div>

        <div class="campo modal-body-full">
          <label for="campoTitulo">Título / incidente</label>
          <input type="text" id="campoTitulo" />
        </div>

        <div class="campo modal-body-full">
          <label for="campoNotas">Notas</label>
          <textarea id="campoNotas" placeholder="Notas internas del incidente..."></textarea>
        </div>

        <div class="campo">
          <label for="campoEncargado">Encargado</label>
          <input type="text" id="campoEncargado" placeholder="Nombre del analista" />
        </div>

        <div class="campo">
          <label for="campoInicioReporte">Inicio (reporte)</label>
          <input type="text" id="campoInicioReporte" readonly />
        </div>

        <div class="campo">
          <label for="campoInicioAsignacion">Inicio (asignación)</label>
          <input type="text" id="campoInicioAsignacion" readonly />
        </div>

        <div class="campo">
          <label for="campoFinalizacion">Finalización</label>
          <input type="text" id="campoFinalizacion" readonly />
        </div>

        <div class="campo modal-body-full">
          <label for="campoEvidenciaEditar">Evidencia (imágenes)</label>
          <input type="file" id="campoEvidenciaEditar" accept="image/*" multiple />
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secundario" type="button" data-modal-close>Cancelar</button>
        <button class="btn btn-primario" type="button" id="btnGuardarCaso">Guardar cambios</button>
      </div>
    </div>
  </div>

  <!-- MODAL NUEVO CASO -->
  <div class="modal-overlay" id="modalNuevoCaso" style="z-index: 1100;">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalNuevoCasoTitulo">
      <div class="modal-header">
        <div class="modal-title" id="modalNuevoCasoTitulo">Nuevo caso</div>
        <button class="modal-close" type="button" data-modal-close>&times;</button>
      </div>
      <div class="modal-body">
        <div class="campo modal-body-full">
          <label for="nuevoPlantilla">Plantilla de caso (opcional)</label>
          <select id="nuevoPlantilla">
            <option value="">Selecciona un caso base...</option>
            <option value="Intento de phishing en correo institucional">Intento de phishing en correo institucional
            </option>
            <option value="Ataque de ransomware a servidor CADI">Ataque de ransomware a servidor CADI</option>
            <option value="Operativo de búsqueda de eventos de riesgo">Operativo de búsqueda de eventos de riesgo
            </option>
            <option value="Ataque DDoS a página institucional">Ataque DDoS a página institucional</option>
            <option value="Investigación de fuga de credenciales">Investigación de fuga de credenciales</option>
            <option value="Cierre de incidente de suplantación de identidad">Cierre de incidente de suplantación de
              identidad</option>
            <option value="Análisis forense de equipo comprometido">Análisis forense de equipo comprometido</option>
            <option value="Monitoreo de actividad sospechosa en red interna">Monitoreo de actividad sospechosa en red
              interna</option>
          </select>
        </div>

        <div class="campo modal-body-full">
          <label for="nuevoTitulo">Título / incidente</label>
          <input type="text" id="nuevoTitulo" placeholder="Describe el nuevo incidente..." />
        </div>

        <div class="campo">
          <label for="nuevoEstado">Estado</label>
          <select id="nuevoEstado">
            <option value="Activo">Activo</option>
            <option value="En Progreso">En Progreso</option>
            <option value="Pausado">Pausado</option>
            <option value="Cerrado">Cerrado</option>
          </select>
        </div>

        <div class="campo">
          <label for="nuevoEncargado">Encargado (Capturista)</label>
          <select id="nuevoEncargado">
            <option value="">Seleccionar capturista...</option>
          </select>
        </div>

        <div class="campo modal-body-full">
          <label for="nuevoNotas">Notas</label>
          <textarea id="nuevoNotas" placeholder="Notas internas del nuevo incidente..."></textarea>
        </div>

        <div class="campo modal-body-full">
          <label for="nuevoEvidencia">Evidencia (imágenes)</label>
          <input type="file" id="nuevoEvidencia" accept="image/*" multiple />
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secundario" type="button" data-modal-close>Cancelar</button>
        <button class="btn btn-primario" type="button" id="btnCrearCaso">Crear caso</button>
      </div>
    </div>
  </div>

  <!-- MODAL NUEVO USUARIO -->
  <div class="modal-overlay" id="modalNuevoUsuario">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalNuevoUsuarioTitulo">
      <div class="modal-header">
        <div class="modal-title" id="modalNuevoUsuarioTitulo">Nuevo usuario</div>
        <button class="modal-close" type="button" data-modal-close>&times;</button>
      </div>
      <div class="modal-body">
        <div class="campo modal-body-full">
          <label for="nuevoNombreUsuario">Nombre completo</label>
          <input type="text" id="nuevoNombreUsuario" placeholder="Nombre y apellidos" />
        </div>

        <div class="campo modal-body-full">
          <label for="nuevoCorreoUsuario">Correo electrónico</label>
          <input type="email" id="nuevoCorreoUsuario" placeholder="usuario@ejemplo.com" />
        </div>

        <div class="campo">
          <label for="nuevoPasswordUsuario">Contraseña</label>
          <input type="password" id="nuevoPasswordUsuario" placeholder="••••••••" />
        </div>

        <div class="campo">
          <label for="nuevoCelularUsuario">Número de celular</label>
          <input type="tel" id="nuevoCelularUsuario" placeholder="+52 ..." />
        </div>

        <div class="campo">
          <label for="nuevoRolUsuario">Rol</label>
          <select id="nuevoRolUsuario">
            <option value="capturista">Capturista</option>
            <option value="admin">Administrador</option>
            <option value="invitado">Invitado</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secundario" type="button" data-modal-close>Cancelar</button>
        <button class="btn btn-primario" type="button" id="btnCrearUsuario">Crear usuario</button>
      </div>
    </div>
  </div>

  <!-- MODAL EVIDENCIAS -->
  <div class="modal-overlay" id="modalEvidencias">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalEvidenciasTitulo">
      <div class="modal-header">
        <div class="modal-title" id="modalEvidenciasTitulo">Evidencias registradas</div>
        <button class="modal-close" type="button" data-modal-close>&times;</button>
      </div>
      <div class="modal-body modal-body-full">
        <div class="tabla-evidencias-wrapper">
          <table class="tabla-evidencias">
            <thead>
              <tr>
                <th>CASE ID</th>
                <th>Incidente</th>
                <th>Archivo</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody id="tablaEvidenciasBody">
              <!-- filas generadas desde JS -->
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secundario" type="button" data-modal-close>Cerrar</button>
      </div>
    </div>
  </div>

  <!-- MODAL REPORTE -->
  <div class="modal-overlay" id="modalReporte">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalReporteTitulo">
      <div class="modal-header">
        <div class="modal-title" id="modalReporteTitulo">Nuevo reporte</div>
        <button class="modal-close" type="button" data-modal-close>&times;</button>
      </div>
      <div class="modal-body">
        <div class="campo modal-body-full">
          <label for="reporteTitulo">Título del reporte</label>
          <input type="text" id="reporteTitulo" placeholder="Resumen corto del reporte" />
        </div>

        <div class="campo">
          <label for="reporteCaso">Caso relacionado</label>
          <select id="reporteCaso">
            <!-- opciones generadas desde JS -->
          </select>
        </div>

        <div class="campo">
          <label for="reporteTipo">Tipo</label>
          <select id="reporteTipo">
            <option value="Incidente">Incidente</option>
            <option value="Alerta">Alerta</option>
            <option value="Análisis">Análisis</option>
            <option value="Otro">Otro</option>
          </select>
        </div>

        <div class="campo">
          <label for="reporteSeveridad">Severidad</label>
          <select id="reporteSeveridad">
            <option value="Baja">Baja</option>
            <option value="Media">Media</option>
            <option value="Alta">Alta</option>
            <option value="Crítica">Crítica</option>
          </select>
        </div>

        <div class="campo modal-body-full">
          <label for="reporteResumen">Resumen</label>
          <textarea id="reporteResumen" placeholder="Resumen ejecutivo del reporte..."></textarea>
        </div>

        <div class="campo modal-body-full">
          <label for="reporteDetalle">Detalle técnico</label>
          <textarea id="reporteDetalle" placeholder="Describe hallazgos, evidencia, acciones tomadas..."></textarea>
        </div>

        <div class="campo modal-body-full">
          <label for="reporteAdjuntos">Adjuntar evidencia</label>
          <input type="file" id="reporteAdjuntos" multiple />
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secundario" type="button" data-modal-close>Cancelar</button>
        <button class="btn btn-primario" type="button" id="btnCrearReporte">Crear reporte</button>
      </div>
    </div>
  </div>

  <!-- MODAL ADMIN -->
  <div class="modal-overlay" id="modalAdmin">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalAdminTitulo">
      <div class="modal-header">
        <div class="modal-title" id="modalAdminTitulo">Admin - usuarios e incidentes</div>
        <button class="modal-close" type="button" data-modal-close>&times;</button>
      </div>
      <div class="modal-body modal-body-admin">
        <div class="modal-col">
          <h3>Usuarios</h3>
          <ul id="adminUsuariosLista" class="admin-usuarios-lista"></ul>
        </div>
        <div class="modal-col">
          <h3>Incidentes</h3>
          <div id="adminCasosLista" class="admin-casos-lista"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secundario" type="button" data-modal-close>Cerrar</button>
      </div>
    </div>
  </div>

  <!-- MODAL GESTIÓN DE CASOS (TABLA) -->
  <!-- MODAL ADMIN (GESTIÓN) -->
  <div class="modal-overlay" id="modalGestionCasos" style="z-index: 1050;">
    <div class="modal modal-xl" role="dialog" aria-modal="true" aria-labelledby="modalGestionCasosTitulo" style="width: 95%; max-width: 1200px; display: flex; flex-direction: column; max-height: 90vh;">
      <div class="modal-header">
        <div class="modal-title" id="modalGestionCasosTitulo">Administración</div>
        <button class="modal-close" type="button" data-modal-close>&times;</button>
      </div>
      
      <!-- Tabs de navegación -->
      <div class="modal-tabs" style="padding: 0 1.5rem; border-bottom: 1px solid #334155; display: flex; gap: 1rem; flex-shrink: 0;">
        <button class="tab-btn active" data-tab="casos" style="background: none; border: none; color: white; padding: 1rem; cursor: pointer; border-bottom: 2px solid #3b82f6;">Casos</button>
        <button class="tab-btn" data-tab="usuarios" style="background: none; border: none; color: #94a3b8; padding: 1rem; cursor: pointer;">Usuarios</button>
      </div>

      <div class="modal-body" style="padding: 1.5rem; overflow-y: auto; flex: 1; display: flex; flex-direction: column;">
        
        <!-- VISTA CASOS -->
        <div id="adminCasosView" style="width: 100%;">
            <!-- Filtros Responsivos (Flexbox) -->
            <div class="filtros-container" style="display: flex; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem; align-items: center;">
                <input type="text" id="busquedaCasos" placeholder="Buscar por ID, Título..." class="input-filtro" style="flex: 1 1 200px; background: #1e293b; border: 1px solid #334155; color: white; padding: 0.5rem; border-radius: 0.375rem;">
                
                <select id="filtroEstado" class="select-filtro" style="flex: 1 1 150px; background: #1e293b; border: 1px solid #334155; color: white; padding: 0.5rem; border-radius: 0.375rem;">
                    <option value="">Todos los estados</option>
                    <option value="activo">Activo</option>
                    <option value="en progreso">En Progreso</option>
                    <option value="pausado">Pausado</option>
                    <option value="cerrado">Cerrado</option>
                </select>

                <input type="date" id="filtroFecha" class="input-filtro" style="flex: 1 1 150px; background: #1e293b; border: 1px solid #334155; color: white; padding: 0.5rem; border-radius: 0.375rem;">
            </div>

            <div class="tabla-container" style="overflow-x: auto; border: 1px solid #334155; border-radius: 0.375rem; width: 100%;">
                <table class="tabla-gestion" style="width: 100%; border-collapse: collapse; color: white; min-width: 800px;">
                    <thead>
                    <tr style="border-bottom: 1px solid #334155; text-align: left; background-color: #0f172a;">
                        <th style="padding: 1rem; white-space: nowrap;">CASE ID</th>
                        <th style="padding: 1rem; white-space: nowrap;">STATUS</th>
                        <th style="padding: 1rem;">TITLE</th>
                        <th style="padding: 1rem; white-space: nowrap;">DATE</th>
                        <th style="padding: 1rem; white-space: nowrap;">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody id="tablaGestionCasosBody">
                    <!-- Rows injected by JS -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- VISTA USUARIOS -->
        <div id="adminUsuariosView" style="display: none; width: 100%;">
            <div class="filtros-container" style="display: flex; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem; align-items: center;">
                <input type="text" id="busquedaUsuarios" placeholder="Buscar por Nombre, Email..." class="input-filtro" style="flex: 1 1 300px; background: #1e293b; border: 1px solid #334155; color: white; padding: 0.5rem; border-radius: 0.375rem;">
            </div>

            <div class="tabla-container" style="overflow-x: auto; border: 1px solid #334155; border-radius: 0.375rem; width: 100%;">
                <table class="tabla-gestion" style="width: 100%; border-collapse: collapse; color: white; min-width: 800px;">
                    <thead>
                    <tr style="border-bottom: 1px solid #334155; text-align: left; background-color: #0f172a;">
                        <th style="padding: 1rem; white-space: nowrap;">ID</th>
                        <th style="padding: 1rem;">NOMBRE</th>
                        <th style="padding: 1rem;">EMAIL</th>
                        <th style="padding: 1rem; white-space: nowrap;">ROL</th>
                        <th style="padding: 1rem; white-space: nowrap;">ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody id="tablaGestionUsuariosBody">
                    <!-- Rows injected by JS -->
                    </tbody>
                </table>
            </div>
        </div>

      </div>
      <div class="modal-footer" style="flex-shrink: 0;">
        <button class="btn btn-secundario" type="button" data-modal-close>Cerrar</button>
      </div>
    </div>
  </div>

  <!-- MODAL EDITAR USUARIO -->
  <div class="modal-overlay" id="modalEditarUsuario" style="z-index: 1100;">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalEditarUsuarioTitulo">
      <div class="modal-header">
        <div class="modal-title" id="modalEditarUsuarioTitulo">Editar usuario</div>
        <button class="modal-close" type="button" data-modal-close>&times;</button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="editUserId">
        
        <div class="campo modal-body-full">
          <label for="editNombreUsuario">Nombre completo</label>
          <input type="text" id="editNombreUsuario" placeholder="Ej: Juan Pérez" />
        </div>

        <div class="campo modal-body-full">
          <label for="editEmailUsuario">Correo electrónico</label>
          <input type="email" id="editEmailUsuario" placeholder="usuario@osint.com" />
        </div>

        <div class="campo">
          <label for="editRolUsuario">Rol</label>
          <select id="editRolUsuario">
            <option value="admin">Admin</option>
            <option value="consultor">Consultor</option>
            <option value="capturista">Capturista</option>
          </select>
        </div>

        <div class="campo">
          <label for="editPasswordUsuario">Contraseña (opcional)</label>
          <input type="password" id="editPasswordUsuario" placeholder="Dejar en blanco para no cambiar" />
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secundario" type="button" data-modal-close>Cancelar</button>
        <button class="btn btn-primario" type="button" id="btnGuardarUsuario">Guardar cambios</button>
      </div>
    </div>
  </div>

  <!-- Asegurar que el modal de Nuevo Caso tenga mayor Z-Index y estilos corregidos -->
  <style>
      #modalNuevoCaso, #modalEditarCaso, #modalEditarUsuario { z-index: 1100 !important; }
      
      /* Ajustes para tabla oscura */
      #tablaGestionCasosBody tr:hover, #tablaGestionUsuariosBody tr:hover { background-color: #1e293b; }
      #tablaGestionCasosBody td, #tablaGestionUsuariosBody td { padding: 1rem; border-bottom: 1px solid #334155; color: #f1f5f9; vertical-align: middle; }
      
      /* Badge fix */
      .badge-estado-modal { white-space: nowrap; display: inline-block; }
      
      /* Responsive adjustments for the grid */
      @media (max-width: 768px) {
          #modalGestionCasos .modal-body > div:first-child {
              grid-template-columns: 1fr;
          }
      }
  </style>

  <!-- JS global y de componentes -->
  <script src="{{ asset('assets/dashboard/navbar/navbar.js') }}"></script>
  <script src="{{ asset('assets/dashboard/sidebars/sidebars.js') }}"></script>
  <script src="{{ asset('assets/dashboard/main-content/main-content.js') }}"></script>
  <script src="{{ asset('assets/dashboard/index.js') }}"></script>
  <!-- MODAL BITÁCORA (ACTIVITY LOG) -->
  <div class="modal-overlay" id="modalBitacora" aria-hidden="true">
    <div class="modal-container" role="dialog" aria-modal="true" style="max-width: 900px; background-color: #fff; color: #333;">
      <header class="modal-header" style="border-bottom: 1px solid #e5e7eb;">
        <h2 class="modal-title" style="color: #1e293b;">Bitácora de Actividad</h2>
        <button class="modal-close" type="button" aria-label="Cerrar" style="color: #64748b;">&times;</button>
      </header>
      <div class="modal-body" style="padding: 1.5rem; display: block;">
        <div class="table-container" style="max-height: 60vh; overflow-y: auto;">
            <table class="data-table" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #f8fafc; color: #475569;">
                        <th style="padding: 0.75rem; text-align: left; font-weight: 600; border: 1px solid #e2e8f0;">Fecha/Hora</th>
                        <th style="padding: 0.75rem; text-align: left; font-weight: 600; border: 1px solid #e2e8f0;">Usuario</th>
                        <th style="padding: 0.75rem; text-align: left; font-weight: 600; border: 1px solid #e2e8f0;">Acción</th>
                        <th style="padding: 0.75rem; text-align: left; font-weight: 600; border: 1px solid #e2e8f0;">Descripción</th>
                    </tr>
                </thead>
                <tbody id="tablaBitacoraBody">
                    <!-- Rows will be populated by JS -->
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
