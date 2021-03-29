<h1 class="wrapper">Configuración de Pixel</h1>
<form method="post">
  <p>
    Identificador del píxel:
    <input type="text" name="ID_Pixel_FB" value="<?php echo ($valor_option = get_option('Pixel_FB'))? $valor_option : ''; ?>">
  </p>
  <p>
    <input type="submit" class="button-primary" value="Guardar">
  </p>
</form>
