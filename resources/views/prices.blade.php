<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Planes y Precios - Gimnasio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #121212;
    }

    .header {
      background-color:rgb(53, 53, 53);
      color: #ffc107;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 90px;
    }

    .header span {
      color: white;
    }

	.banner {
    background: url('https://res.cloudinary.com/dup51jxlj/image/upload/v1741737732/FondoAreaClientes_1_znjsxx.png') no-repeat center center;
    background-size: cover; /* Ocupa toda la pantalla, aunque recorte un poco */
    height: 500px; /* Hace que ocupe toda la pantalla */
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 32px;
    font-weight: bold;
}

    .pricing-section {
      background-color: #f8f8f8;
      padding: 40px;
      text-align: center;
    }

    .card {
      border-radius: 10px;
      padding: 20px;
    }

    .btn-primary,
    .btn-warning,
    .btn-success {
      background-color: #ffc107;
      border: none;
      color: black;
    }

    .footer-text {
      color: red;
      font-weight: bold;
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="header">
    <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741737236/Logo_Letras_solo_3_yiwriy.png"
      alt="VAS A LLORAR GYM" style="width: 350px;">
    <div style="display: flex; align-items: center; gap: 10px;">
      <span>¡Hola (Usuario)!</span>
      <a href="/user-access">
        <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741180217/cuenta_2_s4gs1a.png" alt="Cuenta de usuario"
          style="width: 40px; height: 40px; cursor: pointer;">
      </a>
    </div>
  </div>

  <div class="banner">
    SELECCIONA TU ABONO
  </div>

  <div class="pricing-section">
    <div class="row justify-content-center">
      <!-- Plan Comfort -->
      <div class="col-md-3 mx-2">
        <div class="card shadow">
          <h4 class="text-uppercase"><b>Comfort</b></h4>
          <h3>€24,99</h3>
          <p>/ 4 semanas</p>
          <p>- Acceso a todas las instalaciones del gimnasio apuntado.</p>
          <p>- Horario ilimitado.</p>
          <p>- Acceso a la web, pudiendo apuntarte a actividades grupales.</p>
          <p><b>Selecciona el único gimnasio al que tendrás acceso: </b></p>
          <form action="{{ route('price-view.store') }}" method="POST">
            @csrf
            <select name="gimnasio" class="form-control" required>
              <option value="">Elige un gimnasio</option>
              @foreach($gimnasios as $gimnasio)
              <option value="{{ $gimnasio['id'] }}">{{ $gimnasio['nombre'] }} - {{ $gimnasio['direccion'] }}
              </option>
              @endforeach
            </select>
            <input type="hidden" name="plan" value="Comfort">
            <button type="submit" class="btn btn-primary mt-3">ELIGE COMFORT</button>
          </form>
        </div>
      </div>

      <!-- Plan Premium -->
      <div class="col-md-3 mx-2">
        <div class="card shadow">
          <h4 class="text-uppercase"><b>Premium</b></h4>
          <h3>€29,99</h3>
          <p>/ 4 semanas</p>
          <p><b>Todo desde el plan confort y ademas:</b></p>
          <p>- ¡Acceso ilimitado a todos los clubes de España!</p>
          <p>-  Posiblidad de reservar instalaciones.</p>
          <p><b>Selecciona el gimnasio al que tendrás acceso: </b></p>
          <form action="{{ route('price-view.store') }}" method="POST">
            @csrf
            <select name="gimnasio" class="form-control" required>
              <option value="">Elige un gimnasio</option>
              @foreach($gimnasios as $gimnasio)
              <option value="{{ $gimnasio['id'] }}">{{ $gimnasio['nombre'] }} - {{ $gimnasio['direccion'] }}
              </option>
              @endforeach
            </select>
            <input type="hidden" name="plan" value="Premium">
            <button type="submit" class="btn btn-warning mt-3">ELIGE PREMIUM</button>
          </form>
        </div>
      </div>

      <!-- Plan Ultimate -->
      <div class="col-md-3 mx-2">
        <div class="card shadow">
          <h4 class="text-uppercase"><b>Ultimate</b></h4>
          <h3>€34,99</h3>
          <p>/ 4 semanas</p>
          <p><b>Todo desde Plan Comfort, y Premium:</b></p>
          <p>- Invita a un amigo de manera ilimitada.</p>
          <p>- Acceso a horarios de los entrenadores y posiblidad de acesoramiento personalizado..</p>
          <p><b>Selecciona el gimnasio al que tendrás acceso: </b></p>
          <form action="{{ route('price-view.store') }}" method="POST">
            @csrf
            <select name="gimnasio" class="form-control" required>
              <option value="">Elige un gimnasio</option>
              @foreach($gimnasios as $gimnasio)
              <option value="{{ $gimnasio['id'] }}">{{ $gimnasio['nombre'] }} - {{ $gimnasio['direccion'] }}
              </option>
              @endforeach
            </select>
            <input type="hidden" name="plan" value="Ultimate">
            <button type="submit" class="btn btn-success mt-3">ELIGE ULTIMATE</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-text">
  * Para suscribirte a un plan debes crearte una 
  <a href="/user-creator">cuenta</a> primero.
</div>

</body>

</html>
