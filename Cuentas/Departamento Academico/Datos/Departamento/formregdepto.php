  <!DOCTYPE>
 <html>
 <head>
   <meta charset="iso-8859-1">
   <link type="text/css" rel="stylesheet" href="../../css/estilo.css" />
   </head>
  <section>
<fieldset style="border:2px solid #F60; width:550px">

<legend>Registro de Departamento</legend>
<form name="depto" method="POST" action="register.php" >
<table width="700" >
  <tr>
    <td width="192">Nombre del Departamento:</td>
    <td width="216"><input type="text" name="departamento" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
    <td width="163">Jefe a Cargo:</td>
<td width="198">
  <?php include('../../select/jefeacad.php') ?>
    
      <select name="idjefeacad" size="0" style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()">
     <option >----------------SIN ASIGNAR-------------</option> 
    <?php while ($pe = mysql_fetch_array($query)){ ?>
    
     <option value="<?php echo $pe['idjefeacad']?>"><?php echo   utf8_decode($pe['ncompleto']) ?></option>
     <?php } ?>
     </select>

</td>
 </tr>
 
 <tr>
  <td></td>
<td><br><input type="submit" name="register" id="register" class="button" value="Guardar"></td>
<td></td>
<td><br><input type="reset" name="borrar" class="button" value="Borrar"></td>

</tr>
</table>
</form>

</fieldset> 
</section> 
</html>