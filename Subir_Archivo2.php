<?php
	ECHO "Iniciando transferencia de archivo </br>";
	ECHO "INSERT INTO usuarios (id_Usuario, Nombre_Usuario, Foto) VALUES (NULL, 'Cos', 'Cos_Pack.jpg')";
	ECHO "</BR>";
	
	//CONEXION A BD
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "bd_s131";
	
	$conexion = mysqli_connect($servername, $username, $password, $database);
	
	//INICIAR LA TRANSFERENCIA DEL ARCHIVO
	//1. Validar si se presionó un submit con un formulario
	//tipo POST
	IF(ISSET($_POST["submit"])){
		ECHO "</BR> Se presionó un botón submit en un 
		formulario POST </BR>";
		//[NOMBRE DEL BOTON QUE SUBE ARCHIVOS] [nombre temporal]
		$archivoOrigen = $_FILES["fileToUpload"]["tmp_name"];
		$archivoDestino = "img/".$_FILES["fileToUpload"]["name"];
		ECHO "El archivo transferido es: ".$archivoDestino;
		ECHO "</BR>";
		
		$ImagenFileType = pathinfo($archivoDestino,
		PATHINFO_EXTENSION);
		
		$check = getimagesize($archivoOrigen);
		
		ECHO "Extensión del archivo: ".$ImagenFileType."</BR>";
		
		if ($check !== false){
			echo "El archivo es una imagen </BR>";
			
			move_uploaded_file ($archivoOrigen,$archivoDestino);
			$query = "INSERT INTO usuarios (id_Usuario, Nombre_Usuario, Foto) VALUES (NULL, 'Cos', 'Cos_Pack.xlsx')";
			ECHO "Query a ejecutar:".$query."</BR>";
			
			if($qury_a_ejecutar=mysqli_query($conexion, $query)){
				Echo"query ejecutado </br>";
				Header("Refresh:5; url   = formulario_Archivo.html");
			}else{
				ECHO" query  no ejecutado</br>";
			}
		}else{
			echo" El archivo no es una imagen</br>";
		}
				
	}
?>