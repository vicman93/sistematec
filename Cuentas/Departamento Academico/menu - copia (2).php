<?php
$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
	mysql_select_db("sistema",$conex)
	or die("ERROR con la base de datos");
	
session_start();

if(!$_SESSION){
	header("location:login.php");
}
$id_deptoacad =$_SESSION['id_deptoacad'];
$consulta= "SELECT iddeptoacad, nombrec,cargo, password FROM deptoacad WHERE iddeptoacad='$id_deptoacad'";
$resultado=mysql_query($consulta,$conex) or die (mysql_error());
$resultado_obtenido= mysql_fetch_array($resultado);
$iddeptoacad = $resultado_obtenido['iddeptoacad'];
$nombrec = $resultado_obtenido['nombrec'];
$cargo = $resultado_obtenido['cargo'];
$password = $resultado_obtenido['password'];

?>

<?php include("includes/header.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <script type="text/javascript" src="js/cambiarPestanna.js"></script>
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <title>
         
        </title>
    </head>
   <body>
 	
	     
	  <div class="contenedor">
            <div>
            <center>
            <table width="1020" >
  <tr>
    <td width="30"><img src="imagenes/logoITC.png"  ></td>
    <td width="878"><center><h1>Instituto Tecnologico de Campeche</h1>    <h2>Sistema de Registro de Actividades Complementarias de Tutorias y Orientación Academica</h2></center>
    </td>
    <td width="30" align="right"><img src="imagenes/logo-tec.png" ></td>
  </tr>
</table>
            </center>
            
			<center><h2>Bienvenido</h2>
            <table width="1020" align="center">
  <tr>
    <td width="210">&nbsp;</td>
    <td align="center" width="600">
<h2><span><strong><?php echo utf8_encode($nombrec);?> </strong></span></h2>
<h2><span><strong><?php echo $cargo;?> </strong></span></h2>
    </td>
    <td width="210" align="right"><strong><p align="right"><a href="logout.php">Cerrar Sesión</a> </p></strong>   
</td>
  </tr>
</table>


    </center> 
			</div>
            
            <div id="pestanas">
                <ul id=lista>
                    <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Tutorias</a></li>
                    <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>O.Educativa</a></li>
                    <li id="pestana3"><a href='javascript:cambiarPestanna(pestanas,pestana3);'>Altas</a></li>
                    <li id="pestana4"><a href='javascript:cambiarPestanna(pestanas,pestana4);'>Modificación</a></li>
                    <li id="pestana5"><a href='javascript:cambiarPestanna(pestanas,pestana5);'>Bajas</a></li>
                    <li id="pestana6"><a href='javascript:cambiarPestanna(pestanas,pestana6);'>Cambiar Contraseña</a></li>
          
                                   
                </ul>
            </div>
            
            <body onload="javascript:cambiarPestanna(pestanas,pestana1);">
       
            <div id="contenidopestanas">
                <div id="cpestana1">
                      <form>
  <center>
<table border="4" >
<thead>
 <tr>
 <td><b><center>Tipo de Actividad</center></b></td>
   <td><b><center>Nombre de la Actividad</center></b></td>
   <td><b><center>Ponente</center></b></td>
   <td><b><center>Fecha realizada</center></b></td>
   <td><b><center>  Imprimir  </center></b></td>
 </tr>

<tr>
<?php
include ('includes/conex.php');
?>
<?php
$consulta_mysql="select idactividad,area,tipoact, nombact, ponente, fecha from actividad where area = 'TUTORIAS'  order by fecha desc";
$result_consulta_mysql=mysql_query($consulta_mysql,$con);
while($row = mysql_fetch_array($result_consulta_mysql)){?>
<td><?php echo $row['tipoact'] ?></td>
<td><?php echo $row['nombact'] ?></td>
<td><?php echo $row['ponente'] ?></td>
<td><?php echo $row['fecha'] ?> </td>
<td><?php echo ' <input type="submit" name="imprimir" formaction="Datos/formatos/asistencia_lista.php" value="Imprimir a PDF"> ' ?> 
</td>
	 </tr>
	<?php
    }
    ?>
   
</thead>
</table>
</center>
         </form>    
				</div>
              <div id="cpestana2">
        <form>
  <center>
<table border="4" >
<thead>
 <tr>
    <td><b><center>Tipo de Actividad</center></b></td>
   <td><b><center>Nombre de la Actividad</center></b></td>
   <td><b><center>Ponente</center></b></td>
   <td><b><center>Fecha realizada</center></b></td>
   <td><b><center>  Imprimir  </center></b></td>
 </tr>

<tr>
<?php
include ('includes/conex.php');
?>
<?php
$consulta_mysql="select idactividad,area,tipoact, nombact, ponente, fecha from actividad  where area = 'ORIENTACION EDUCATIVA' order by fecha desc";
$result_consulta_mysql=mysql_query($consulta_mysql,$con);
while($row = mysql_fetch_array($result_consulta_mysql)){?>
<td><?php echo $row['tipoact'] ?></td>
<td><?php echo $row['nombact'] ?></td>
<td><?php echo $row['ponente'] ?></td>
<td><?php echo $row['fecha'] ?> </td>
<td><?php echo ' <input type="submit" name="imprimir" formaction="Datos/formatos/asistencia_lista.php" value="Imprimir a PDF"> ' ?> 
</td>
	 </tr>
	<?php
    }
    ?>
   
</thead>
</table>
</center>
         </form>    
				</div>
                <div id="cpestana3">
                <section>
  <fieldset style="border:2px solid #F60; width:950px">
<legend>Registro de Jefes de Departamento:</legend>
<form name="j_depto" method="POST" action="Datos/Jefes Academicos/register.php" >
<table width="800" >
  <tr>
    <td width="192" >RFC:<br></td>
   <td width="216">   <input type="text" name="rfc" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
     <td width="192">Nombre Completo:</td>
    <td width="216"><input type="text" name="ncompleto" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
  </tr>
   <tr>
    <td width="192" >Responsable del Registro:<br></td>
   <td width="216">  
        <select name="iddeptoacad" size="0"> 
    
<option value="<?php echo utf8_decode($iddeptoacad) ?>"><?php echo $nombrec?></option>
          </select>
          </td>
     
  </tr>
  <tr>
  <td></td>
<td><br><input type="submit" name="register" id="register" class="button" value="Guardar"></td>
<td><br><input type="reset" name="borrar" class="button" value="Borrar"></td>
<td></td>
</tr>
</table>
</form>

</fieldset> 
</section> 
<br>
   <section>
<fieldset style="border:2px solid #F60; width:950px">

<legend>Registro de Actividades </legend>
<form name="actividad" method="POST" action="Datos/Actividades/register.php" >
<table width="800" >
    <tr>
     <td width="192">Institución:</td>
    <td width="216"><input type="text" name="institucion" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
    <td>Area que imparte la actividad: </td>
<td >
<select name="area" style="inline-box-align:initial inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()" >
<option> ------SIN ASIGNAR------</option>
<option value="TUTORIAS"> TUTORIAS </option>
<option value="ORIENTACION EDUCATIVA"> ORIENTACIÓN EDUCATIVA </option>

</select>

</td>
  </tr>
  <tr>
      <td width="192">Tipo de Actividad:</td>
    <td width="216"><select name="tipoact" style="inline-box-align:initial inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()" >
<option> ----SIN ASIGNAR-----</option>
<option value="TUTORIA"> TUTORIA </option>
<option value="CONFERENCIA"> CONFERENCIA </option>
<option value="TALLER"> TALLER </option>
<option value="ASESORIA ACADEMICA"> ASESORIA ACADEMICA </option>
</select></td>
    <td>Nombre de la actividad:</td>
<td><input type="text" name="nombact" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();" ></td>
  </tr>
   <tr>
      <td>Ponente:</td>
    <td><input type="text" name="ponente" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"> </td>
 <td>Fecha:</td>
    <td><input type="date" name="fecha"></td>
  </tr>
  <tr>
      
    <td>Hora de Entrada:</td>
<td><input type="time" name="horae" ></td>
<td>Hora de Salida:</td>
    <td><input type="time" name="horas"></td>
  </tr>
  <tr>
      <td>Duracion del evento:</td>
<td><input type="text" name="totalh"  placeholder="Total de horas" ></td>
 <td>Periodo de Realización:</td>
    <td>
    <input type="text" name="periodo" placeholder="AÑO INICIO- AÑO FIN" style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()" >
    </td>
 
  </tr>
    <tr>
      <td>Responsable del Registro de Actividad:</td>
    <td>
     <select name="iddeptoacad" size="0"> 
 <option value=" <?php echo utf8_decode($iddeptoacad) ?>"><?php echo $nombrec?></option>
</select>
    </td>
 <td></td>
    <td> </td>
 
  </tr>
  <tr>
  <td></td>
<td><br><input type="submit" name="register" id="register" class="button" value="Guardar"></td>
<td><br><input type="reset" name="borrar" class="button" value="Borrar"></td>
<td></td>
</tr>
</table>
</form>

</fieldset> 
</section>
<br>
   <section>
<fieldset style="border:2px solid #F60; width:950px">

<legend>Registro de Departamento</legend>
<form name="depto" method="POST" action="Datos/Departamento/register.php" >
<table width="800" >
  <tr>
    <td width="192">Nombre del Departamento:</td>
    <td width="216"><input type="text" name="departamento" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
    <td width="163">Jefe a Cargo:</td>
<td width="198">
  <?php include('select/jefeacad.php') ?>
    
      <select name="idjefeacad" size="0" style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()">
     <option >-----------------SIN ASIGNAR--------------</option> 
    <?php while ($pe = mysql_fetch_array($query)){ ?>
    
     <option value="<?php echo $pe['idjefeacad']?>"><?php echo   utf8_decode($pe['ncompleto']) ?></option>
     <?php } ?>
     </select>

</td>
 </tr>
 
 <tr>
  <td></td>
<td><br><input type="submit" name="register" id="register" class="button" value="Guardar"></td>
<td><br><input type="reset" name="borrar" class="button" value="Borrar"></td>
<td></td>
</tr>
</table>
</form>

</fieldset> 
</section> 
<br>
   <section>
<fieldset style="border:2px solid #F60; width:950px">

<legend>Registro de Carrera</legend>
<form name="carr" method="POST" action="Datos/Carreras/register.php" >
<table width="800">
  <tr>
   
    <td width="167">Nombre de la Carrera:</td>
<td width="192"><input type="text" name="carrera" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();">
   </td>

 <td width="199">Clave Carrera:</td>
    <td width="222"><input type="text" name="siglascarrera" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
  </tr>
  <tr>
     <td>Departamento al que pertenece:</td>
    <td><?php include('select/departamento.php') ?>
    
      <select name="iddepartamento" size="0" style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()"> 
     <option >--------------------SIN ASIGNAR-----------------</option> 
    <?php while ($pe = mysql_fetch_array($query)){ ?>
    
     <option value="<?php echo $pe['iddepartamento']?>"><?php echo $pe['departamento']?></option>
     <?php } ?>
     </select>
    </td>
    
  </tr>
  
 <tr>
  <td></td>
<td><br><input type="submit" name="register" id="register" class="button" value="Guardar"></td>
<td><br><input type="reset" name="borrar" class="button" value="Borrar"></td>
<td></td>
</tr>
</table>
</form>

</fieldset> 
</section> 
<br>
   <section>
<fieldset style="border:2px solid #F60; width:950px">

<legend>Registro de personal de Depto. de Desarrollo Academico</legend>
<form name="deptoacad" method="POST" action="Datos/Departamento Academico/register.php" >
<table width="800" >
 <tr>
    <td width="202">Nombre Completo:</td>
    <td width="219"><input type="text" name="nombrec" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
    <td width="169">Cargo:</td>
<td width="190">
<select name="cargo" style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()">
<option>---------------------SIN ASIGNAR---------------------</option>
<option value="JEFE(A) DE DEPARTAMENTO DE DESARROLLO ACADEMICO "> JEFE(A) DE DEPARTAMENTO DE DESARROLLO ACADEMICO </option>
<option value="COORDINADOR INSTITUCIONAL DE TUTORIAS"> 
COORDINADOR INSTITUCIONAL DE TUTORIAS </option>
<option value="COORDINADOR INSTITUCIONAL DE ORIENTACIÓN EDUCATIVA"> COORDINADOR INSTITUCIONAL DE ORIENTACIÓN EDUCATIVA </option>
</select>

</td>
  </tr>
  <tr>
     <td>Nombre de usuario:</td>
    <td><input type="text" name="usuario" style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px";></td>
    <td>Password:</td>
<td><input type="password" name="password"></td>
  </tr>
  <tr>
<td></td>
<td><br><input type="submit" name="register" id="register" class="button" value="Guardar"></td>
<td><br><input type="reset" name="borrar" class="button" value="Borrar" align="left"></td>
<td></td>
</tr>
</table>
</form>

</fieldset> 
</section>
<br>
                <section>
  <fieldset style="border:2px solid #F60; width:950px">
<legend>Registro de Jefe(a) de Depto. de Servicios Escolares:</legend>
<form name="j_usuario" method="POST" action="Datos/DeptoServEsc/register.php" >
<table width="800" >
  <tr>
    <td width="192" >Nombre Completo:<br></td>
   <td width="216">  
   <input type="text" name="nombcompleto" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();">
   </td>
          
     <td width="192">
     Responsable del Registro:
     </td>
    <td width="216">
    <select name="iddeptoacad" size="0"> 
    
<option value="<?php echo $iddeptoacad ?>"><?php echo $nombrec?></option>
          </select>
    </td>
  </tr>
   <tr>
    
  <tr>
  <td></td>
<td><br><input type="submit" name="register" id="register" class="button" value="Guardar"></td>
<td><br><input type="reset" name="borrar" class="button" value="Borrar"></td>
<td></td>
</tr>
</table>
</form>

</fieldset> 
</section> 
<br>
                <section>
  <fieldset style="border:2px solid #F60; width:950px">
<legend>Registro del periodo escolar:</legend>
<form name="periodo" method="POST" action="Datos/Periodo Escolar/register.php" >
<table width="800" >
  <tr>
    <td width="192" >Periodo Escolar:<br></td>
   <td width="216">  
   <select name="mesi" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
 onkeyup="javascript:this.value=this.value.toUpperCase();">
 <option>Seleccione mes de inicio...... </option>
 <option value="ENERO -">ENERO</option>
 <option value="FEBRERO -">FEBRERO</option>
 <option value="MARZO -">MARZO</option>
 <option value="ABRIL -">ABRIL</option>
 <option value="MAYO -">MAYO</option>
 <option value="JUNIO -">JUNIO</option>
 <option value="JULIO -">JULIO</option>
 <option value="AGOSTO -">AGOSTO</option>
 <option value="SEPTIEMBRE -">SEPTIEMBRE</option>
 <option value="OCTUBRE -">OCTUBRE</option>
 <option value="NOVIEMBRE -">NOVIEMBRE</option>
 <option value="DICIEMBRE -">DICIEMBRE</option>
 </select>
   </td>
          <td width="192" >a:<br></td>
   <td width="216">  
   <input type="age" name="mesf" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();">
   </td>  
     <td width="192">
    
     </td>
    <td width="216">
 
    </td>
  </tr>
   <tr>
    
  <tr>
  <td></td>
<td><br><input type="submit" name="register" id="register" class="button" value="Guardar"></td>
<td><br><input type="reset" name="borrar" class="button" value="Borrar"></td>
<td></td>
</tr>
</table>
</form>

</fieldset> 
</section> 
                </div>
                
                <div id="cpestana4">
   ESPACIO PARA MODIFICAR
	              </div>
                  
                   <div id="cpestana5">
        <form>
   ESPACIO PARA ELIMINAR
         </form>        
	              </div>
                  
                <div id="cpestana6">
<center>
        <?php
        if(isset($_SESSION['id_deptoacad'])) { // comprobamos que la sesión esté iniciada
  if(isset($_POST['enviar'])) {
  if($_POST['password'] != $_POST['clave_conf']) {
                    echo' 
			<script>
window.alert("LAS CONTRASEÑAS NO COINCIDEN, INTENTE DE NUEVO POR FAVOR");
window.location="menu.php";
</script>';
                }else {
                    $id_deptoacad = $_SESSION['id_deptoacad'];
 $password = mysql_real_escape_string($_POST["password"]);
                  // $password = md5($password);   encriptamos la nueva contraseña con md5
                    $sql = mysql_query("UPDATE deptoacad SET password='".$password."' WHERE iddeptoacad='$id_deptoacad'
					");
                    if($sql) {
                      echo '<script> 
window.alert("DATOS INGRESADOS CORRECTAMENTE");
window.location="menu.php";
</script>';
                    }else {
                        echo '
						<script>
window.alert("ERROR, NO SE PUEDE CAMBIAR A CONTRASEÑA");
window.location="menu.php";
</script>';
                    }
                }
            }else {
    ?>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <label>Su contraseña Actual es:</label><br /><br />
                <label><?php echo $password ?></label><br />
  <br />       <label>Nueva contraseña:</label><br />
  <input type="password" name="password" maxlength="15" required /><br />
         <br />       <label>Confirmar:</label><br />
             <input type="password" name="clave_conf" maxlength="15" /><br />
     <br />           <input type="submit" name="enviar" value="Enviar" required/>
            </form>
    <?php
            }
        }else {
            echo "Acceso denegado.";
        }
    ?> 

</center>
       
				</div>
                
              </div>
        </div>
    </body>
	
	<?php include("includes/footer.php"); ?>
	

</html>
