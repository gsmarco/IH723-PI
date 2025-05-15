<?php
  session_start();
  $url = isset($_SESSION['pagina_padre']) ? $_SESSION['pagina_padre'] : 'index.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Medios Digitales</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Mi Biblioteca Digital</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#videos">Videos</a></li>
        <li class="nav-item"><a class="nav-link" href="#documentos">Documentos</a></li>
        <li class="nav-item"><a class="nav-link" href="#musica">Música</a></li>
        <li class="nav-item"><a class="nav-link" href="#pronostico">Clima</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="window.location.href='<?php echo $url; ?>'">Volver</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero (seccion visual principal de la pagina -->
<section id="heroe" class="bg-primary text-white text-center py-5">
  <div class="container">
    <h1>Bienvenidos a mi Centro de Medios Digitales</h1>
    <p class="lead">Explora videos, documentos y música desde la nube y consulta el pronóstico del tiempo</p>
  </div>
</section>

<!-- Seccion de Videos -->
<section id="videos" class="bg-light py-5">
  <div class="container">
    <h2 class="mb-4">🎥 Sección de videos(YouTube / Vimeo)</h2>
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="ratio ratio-16x9">
          <iframe src="https://www.youtube.com/embed/UfWfZwKEZIM" title="Video de YouTube" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="ratio ratio-16x9">
          <iframe src="https://player.vimeo.com/video/384473345" title="Video de Vimeo" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Documentos -->
<section id="documentos" class="py-5">
  <div class="container">
    <h2 class="mb-4">📄 Plataformas de servicios de Documentos</h2>
    <ul class="list-group">
      <li class="list-group-item">
        <a href="https://drive.google.com/file/d/1ro5A5Pelds3zXyMcDLOm5SCkmBn7GBXM/view?usp=sharing" target="_blank">Bases de datos (PDF - Google Drive)</a>
      </li>
      <li class="list-group-item">
        <a href="https://www.dropbox.com/scl/fi/lt0sntzr7swckhu8j2s6t/3.1.-Plataformas-de-aplicaciones-Web.pptx?rlkey=dbac4u68nien7t6i2s0i59f9t&st=5t7p6bz6&dl=0" target="_blank">Plataformas-de-aplicaciones-Web.pptx (dropbox)</a>
        </a>
      </li>
    </ul>
  </div>
</section>

<!-- Música -->
<section id="musica" class="bg-light py-5">
  <div class="container">
    <h2 class="mb-4">🎵 Streaming de música y pódcasts (Spotify / SoundCloud)</h2>
    <div class="row">
      <div class="col-md-6 mb-3">
        <iframe style="border-radius:12px" 
          src="https://open.spotify.com/embed/track/2R6SdNDiebZBzgWQY7Sk89?utm_source=generator" 
          width="100%" height="152" frameBorder="0" allowfullscreen="" 
          allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
          loading="lazy">
        </iframe>
        </div>
      <div class="col-md-6 mb-3">
          <iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay"
          src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/1734881022&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
      </div>
    </div>
  </div>
</section>

<!-- Pronostico del tiempo -->
<section id="pronostico" class="py-5">
<div class="container">
  <h2 class="mb-4">📷 Pronostico del tiempo</h2>
      <!-- <div class="container text-center"> -->
      <input id="ciudadInput" type="text" class="form-control mb-3" placeholder="Ingresa una ciudad">
      <button onclick="obtenerClima()" class="btn btn-primary mb-3">Consultar clima</button>
      <a href="#heroe" class="btn btn-secondary mb-3">Regresar al inicio</a>
          <div id="resultado" class="card p-6 d-none border border-secondary">
              <h3 id="ciudadNombre"></h3>
              <p id="descripcion"></p>
              <p id="temperatura"></p>
              <p id="pressure"></p>
              <p id="humedad"></p>
              <p id="wind"></p>
          </div>
      </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  <div class="container">
    <p>© 2025 Mi Biblioteca Digital | Enlaces a plataformas en la nube</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  async function obtenerClima() {
    const ciudad = document.getElementById("ciudadInput").value;
    const apiKey = "4b71c0ed6c2a94c1f9a590126fc28e06"; // <Api key obtenida al registrarse en el servico
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${ciudad}&appid=${apiKey}&units=metric&lang=es`;

    try {
      const respuesta = await fetch(url);
      if (!respuesta.ok) throw new Error("Ciudad no encontrada");
      const datos = await respuesta.json();

      document.getElementById("resultado").classList.remove("d-none");
      document.getElementById("ciudadNombre").textContent = `${datos.name}, ${datos.sys.country}`;
      document.getElementById("descripcion").textContent = `Clima: ${datos.weather[0].description}`;
      document.getElementById("temperatura").textContent = `Temperatura: ${datos.main.temp}°C`;
      document.getElementById("pressure").textContent = `Presión: ${datos.main.pressure}`;
      document.getElementById("humedad").textContent = `Humedad: ${datos.main.humidity}%`;
      document.getElementById("wind").textContent = `Velocidad del viento: ${datos.wind.speed * 3.6} kms/hora`;
    } catch (error) {
      alert("Error: " + error.message);
    }
  }
</script>

</body>
</html>
