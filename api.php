<?php
require_once 'controllerjson.php';
//funcion validando todos los parametro disponibles
//pasaremos los parametros requeridos a esta funcion 
function isTheseParametersAvailable($params){
    //suponiendo que todo los parametros estan disponibles 
    $available=true;
    $missingparams="";
    foreach($params as $param){
        if(!isset($_POST[$param])||strlen($_POST[$param])<=0){
            $available=false;
            $missingparams=$missingparams.",".$param;
        }
    }

    //si faltan parametros
    if(!$available){
        $response=array();
        $response['error']=true;
        $response['message']='Parametros'.substr($missingparams,1,strlen($missingparams)).'vacio';
        //error de visualizacion
        echo json_encode($response);
        //detener la ejecicion adicional 
        die();
    }
}
// una matriz  para mostrar las respuesta de nuestro api
$response=array();
//si se trata de una llamada api 
// que significa que un parametro get llamado se establece un URL 
//  y con estos parametros estamos concluyendo que es una llamada api 
if(isset($_GET['apicall'])) {
    //Aqui iran todos los llamados de nuestra api 
    switch($_GET['apicall']){
             //opcion crear Usuarios
             case 'createusuario':
             //primero haremos la verificacion de parametros. 
            isTheseParametersAvailable(array('fullname','username','password','secretpin','created'));
            $db=new ControllerJson();
            $result=$db->createUsuarioController($_POST['fullname'],
            $_POST['username'],
            $_POST['password'],
            $_POST['secretpin'],
            $_POST['created'],
             );
        if($result){
            //esto significa que no hay ningun error 
            $response['error']=false;
            //mensaje que se ejecuto correctamente
            $response['message']='usuario agregado correctamente';
            $response['contenido']=$db->readUsuariosController();
        }else{
            $response['error']=true;
            $response['message']='ocurrio un error intenta nuevamente';
        }
   break;
   case'readusuarios':
    $db= new ControllerJson();
    $response['error'] = false;
    $response['message'] = 'Solicitud completada correctamente';
    $response['contenido']=$db->readUsuariosController();
break;
case 'loginusuario':
    isTheseParametersAvailable(array('username','password'));
    $db= new ControllerJson();
    $result =$db->loginUsuarioController($_POST['username'],$_POST['password']);
    if(!$result){
        $response['error']=true;
        $response['menssage'] ='credenciales no validas';
    }else{
        $response['error']=false;
        $response['message']='Bienvenido a nuestra pagina oficial';
        $response['contenido']=$result;
    }
break;
}
}
else{
    //si no es un apo el que esta invocando 
    //empujar los valores apropiados en la estructura json 
    $response['error']=true;
    $response['message']='Llamado Invalido de la API!';
}
    echo json_encode($response);
?>