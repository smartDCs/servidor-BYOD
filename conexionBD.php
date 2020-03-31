<?php
class conexionBD{
    public $destino;
////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////codigo php para leer la base de datos y generar los botones////////
///////////////////////////////////////////////////////////////////////////////////////////           
public function conectar(){
    $user="root";
    $pass="admin";
    $server="localhost";
    $db="byod";
    $con=mysqli_connect($server,$user,$pass,$db) or die ("Error al conectar a la base de datos ".mysql_error());
    return $con;
}

public function leerServidor($con){
    
    $sql = mysqli_query($con, "SELECT * FROM `servidor`");
while ($registro = mysqli_fetch_array($sql)){ 
    $destino=$registro['ip'];
    
    
}

 

    return $destino;
}

public function leerRele($con){
    


    $sql = mysqli_query($con, "SELECT * FROM `lucces` WHERE tipo='rele'");

    return $sql;
}
public function leerDimmer($con){
    


    $sql = mysqli_query($con, "SELECT * FROM `lucces` WHERE tipo='dimmer'");

    return $sql;
}
public function leerCortinas($con){
    


    $sql = mysqli_query($con, "SELECT * FROM `cortinas` WHERE tipo='cortina'");

    return $sql;
}
public function crearRele($sql){
    $row = mysqli_num_rows($sql);
  
    while ($registro = mysqli_fetch_array($sql)){ 
        
        $dev_id=$registro['dev_id'];
        $subnet=$registro['subnet'];
        $canal=$registro['canal'];
        $descripcion=$registro['descripcion'];
        $datos=$subnet.'.'.$dev_id.'.'.$canal;
echo " 
    <button class='rele' style='height:70px;width:70px' onclick='verificarFoco(this)' id=".$datos.
        " value=0><img id='img".$datos."' src='img/service-icon-02.2.png' size  width='40px' height='40px'><br>".
        $descripcion."</img></button> 
    
"; 

} 
}  


public function crearDimmer($sql){
    $row = mysqli_num_rows($sql);
  
    while ($registro = mysqli_fetch_array($sql)){ 
        
        $dev_id=$registro['dev_id'];
        $subnet=$registro['subnet'];
        $canal=$registro['canal'];
        $descripcion=$registro['descripcion'];
        $datos=$subnet.'.'.$dev_id.'.'.$canal;
echo " 
    
 <img id='img".$datos."' src='img/service-icon-02.2.png' size width='40px' height='40px'><br>".$descripcion."<br><label id='valor".$datos."'></label><input class='dimmer' type='range' id='".$datos."' min='0' max='100' value='0' oninput='mostrarValor(this)' style='height:70px;width:70px'></img>
        
"; 

} 
}
public function crearCortina($sql){
    $row = mysqli_num_rows($sql);
  
    while ($registro = mysqli_fetch_array($sql)){ 
        
        $dev_id=$registro['dev_id'];
        $subnet=$registro['subnet'];
        $canal=$registro['canal'];
        $descripcion=$registro['alias'];
        $datos=$subnet.'.'.$dev_id.'.'.$canal;
echo " 
    <button class='cortina' style='height:70px;width:70px' onclick='verificarFoco(this)' id=".$datos.
        " value=0><img id='img".$datos."' src='img/cortina cerrada.png' size  width='40px' height='40px'><br>".
        $descripcion."</img></button> 
    
"; 

} 
}  

}





