<h1 class="wrapper">Configuración de Tags de Marketing</h1>
<form method="post">
  <p>
    Identificador del píxel de Facebook:
    <input type="text" name="ID_Pixel_FB" value="<?php echo ($valor_option = get_option('Pixel_FB'))? $valor_option : ''; ?>">
  </p>
  <p>
    <input type="submit" class="button-primary" value="Guardar">
  </p>
</form>
<footer>
<p>Hecho con <a href="https://wordpress.org/">WordPress</a></p>
</footer>
