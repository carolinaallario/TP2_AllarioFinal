<?php
include './includes/header.php';

include '../TP2_Allario/Includes/config.php';



?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'] ?? '';
  $surname = $_POST['surname'] ?? '';
  $email = $_POST['email'] ?? '';
  $message = $_POST['message'] ?? '';
  $errors = [];

  // Validaciones
  if (empty($name)) {
      $errors['name'] = "El nombre es obligatorio.";
  } elseif (!preg_match("/^[a-zA-ZÀ-ÿ\s]+$/", $name)) {
      $errors['name'] = "El nombre solo puede contener letras y espacios.";
  }

  if (empty($surname)) {
      $errors['surname'] = "El apellido es obligatorio.";
  } elseif (!preg_match("/^[a-zA-ZÀ-ÿ\s]+$/", $surname)) {
      $errors['surname'] = "El apellido solo puede contener letras y espacios.";
  }

  if (empty($email)) {
      $errors['email'] = "El correo electrónico es obligatorio.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "El correo electrónico no tiene un formato válido.";
  }

  if (empty($message)) {
      $errors['message'] = "El mensaje no puede estar vacío.";
  } elseif (strlen($message) < 10) {
      $errors['message'] = "El mensaje debe tener al menos 10 caracteres.";
  }

  // Mostrar errores o procesar datos
  if (!empty($errors)) {
      foreach ($errors as $error) {
          echo "<p style='color: red;'>$error</p>";
      }
  } else {
      echo "<p style='color: green;'>Formulario enviado correctamente. Gracias por contactarnos, $name.</p>";
  }
}

?>

<body class="contact-page">
  <div class="contact-form-container">
    <form action="" method="POST" class="contact-form">
      <h2>Escribinos!</h2>
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required placeholder="Escribe tu nombre">
      </div>
      <div class="form-group">
        <label for="surname">Apellido</label>
        <input type="text" class="form-control" id="surname" name="surname" required placeholder="Escribe tu apellido">
      </div>
      <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" class="form-control" id="email" name="email" required placeholder="Escribe tu correo electrónico">
      </div>
      <div class="form-group">
        <label for="message">Mensaje</label>
        <textarea class="form-control" id="message" name="message" rows="4" required placeholder="Escribe tu mensaje"></textarea>
      </div>
      <button type="submit" class="btn">Enviar</button>
    </form>
  </div>



  <?php include '../TP2_Allario/Includes/footer.php'; ?>

</body>
</html>
