<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php" ?>
  <link rel="stylesheet" href="../css/views/register.css">
  <title>AutoCon - Registro</title>
</head>

<body>
  <?php include "../Tema/Menu.php"; ?>

  <!-- ********** Hero Area ********** -->
  <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/registro.jpg)">
    <h1>
      Registro
    </h1>
  </div>

  <section class="contact-area register">
    <div class="container register">
      <div class="row justify-content-center">
        <!-- Contact Form Area -->
        <div class="col-12 col-md-10 col-lg-8">
          <div class="contact-form">
            <?php if (isset($_SESSION['mensajeBD'])) {
              echo " <p class='alert'> " . $_SESSION['mensajeBD'] . "</p> ";
              unset($_SESSION['mensajeBD']);
            } ?>

            <!-- Contact Form -->
            <form action="../Controladores/ValidarNumero.php" method="post" onsubmit="return dobValidate('dn')">
              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="text" name="username" id="username" required autocomplete="off" minlength='3'>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Nombre de Usuario</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="email" name="email" id="email" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Email</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="text" name="name" id="name" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Nombre</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="text" name="lastname" id="lastname" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Apellidos</label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="group">
                    <input type="text" name="address" id="address" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Dirección</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="text" name="nif" id="nif" required autocomplete="off" maxlength="9">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>DNI</label>
                  </div>
                </div>

                <div class="col-12 col-md-6 date">
                  <div class="group">
                    <input type="date" name="bornDate" id="bornDate" autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Fecha de Nacimiento</label>
                  </div>
                </div>

                <div class="col-12 col-md-6 select">
                  <div class="group">
                    <p>Provincia </p>
                    <select name="province" id="province">
                      <option selected="true" disabled="disabled">-</option>
                      <option value='alava'>Álava</option>
                      <option value='albacete'>Albacete</option>
                      <option value='alicante'>Alicante/Alacant</option>
                      <option value='almeria'>Almería</option>
                      <option value='asturias'>Asturias</option>
                      <option value='avila'>Ávila</option>
                      <option value='badajoz'>Badajoz</option>
                      <option value='barcelona'>Barcelona</option>
                      <option value='burgos'>Burgos</option>
                      <option value='caceres'>Cáceres</option>
                      <option value='cadiz'>Cádiz</option>
                      <option value='cantabria'>Cantabria</option>
                      <option value='castellon'>Castellón/Castelló</option>
                      <option value='ceuta'>Ceuta</option>
                      <option value='ciudadreal'>Ciudad Real</option>
                      <option value='cordoba'>Córdoba</option>
                      <option value='cuenca'>Cuenca</option>
                      <option value='girona'>Girona</option>
                      <option value='laspalmas'>Las Palmas</option>
                      <option value='granada'>Granada</option>
                      <option value='guadalajara'>Guadalajara</option>
                      <option value='guipuzcoa'>Guipúzcoa</option>
                      <option value='huelva'>Huelva</option>
                      <option value='huesca'>Huesca</option>
                      <option value='illesbalears'>Illes Balears</option>
                      <option value='jaen'>Jaén</option>
                      <option value='acoruña'>A Coruña</option>
                      <option value='larioja'>La Rioja</option>
                      <option value='leon'>León</option>
                      <option value='lleida'>Lleida</option>
                      <option value='lugo'>Lugo</option>
                      <option value='madrid'>Madrid</option>
                      <option value='malaga'>Málaga</option>
                      <option value='melilla'>Melilla</option>
                      <option value='murcia'>Murcia</option>
                      <option value='navarra'>Navarra</option>
                      <option value='ourense'>Ourense</option>
                      <option value='palencia'>Palencia</option>
                      <option value='pontevedra'>Pontevedra</option>
                      <option value='salamanca'>Salamanca</option>
                      <option value='segovia'>Segovia</option>
                      <option value='sevilla'>Sevilla</option>
                      <option value='soria'>Soria</option>
                      <option value='tarragona'>Tarragona</option>
                      <option value='santacruztenerife'>Santa Cruz de Tenerife</option>
                      <option value='teruel'>Teruel</option>
                      <option value='toledo'>Toledo</option>
                      <option value='valencia'>Valencia/Valéncia</option>
                      <option value='valladolid'>Valladolid</option>
                      <option value='vizcaya'>Vizcaya</option>
                      <option value='zamora'>Zamora</option>
                      <option value='zaragoza'>Zaragoza</option>
                    </select>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="text" name="population" id="population" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Población</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="number" name="zipCode" id="zipCode" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Código postal</label>
                  </div>
                </div>

                <div class="col-12 col-md-6 tlf">
                  <div class="group">
                    <input type="number" name="mobile" id="mobile" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Número de móvil o telefono</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="password" name="password" id="password" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Contraseña</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="password" name="password2" id="password2" required oninput="check(this)"
                      autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Repite contraseña</label>
                  </div>
                </div>
              </div>

              <div class="col-12 but">
                <button type="submit" class="btn world-btn">Registro</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include "../Tema/Scripts.php"; ?>

  <script>
    function check(inpu) {
      if (inpu.value != document.getElementById('contraseña').value)
        inpu.setCustomValidity('Las contraseñas no coinciden.');
      else
        inpu.setCustomValidity('');
    }

    function dobValidate(dni) {
      var dni = document.getElementById('nif').value;
      number = dni.substr(0, dni.length - 1);
      let = dni.substr(dni.length - 1, 1);
      number = number % 23;
      letter = 'TRWAGMYFPDXBNJZSQVHLCKET';
      letter = letter.substring(number, number + 1);
      if (letter != let) {
        alert("Invalid DNI");
        return false;
      }
    }
  </script>
</body>

</html>