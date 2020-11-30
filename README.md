# Infinitycinema

Aplicacion web básica de compra y alquiler de peliculas desarrollada con HTML, CSS, PHP, MySql con arquitetura MVC, arquitectura BEM (css)

### Características

- Registro e inicio de sesión de usuarios con roles;
- Roles: administrador, usuario, invitado
- Vista de listado de peliculas
- Filtrar por: Titulo de pelicula, año, género
- Facturacion de compra y alquiler
- Panel administrativo con: gestion de peliculas y listado de movimientos
- Datos de pelicula: stock, poster, titulo, precio venta y alquiler, genero, año, descripcion, likes
# Vistas principales

### 1- Vista de Inicio
![](https://raw.githubusercontent.com/jCisneros12/aplicacion-web-peliculas/main/capturas/captura-home.png)

### 2- Vista de listado de peliculas

![](https://github.com/jCisneros12/aplicacion-web-peliculas/blob/main/capturas/captura-peliculas.png?raw=true)

### 3- Vista de formulario de Inicio de sesión

![](https://github.com/jCisneros12/aplicacion-web-peliculas/blob/main/capturas/captura-login.png?raw=true)


### 4- Vista de panel administrativo - películas

![](https://github.com/jCisneros12/aplicacion-web-peliculas/blob/main/capturas/captura-dashboard.png?raw=true)

### 4- Vista de panel administrativo - movimientos

![](https://github.com/jCisneros12/aplicacion-web-peliculas/blob/main/capturas/captura-movimientos.png?raw=true)

# Implementacion

### Estructura

- Crear base de datos con el nombre **"infinitycinema_bd"** importar el achivo .sql que se encuentra en: 
**aplicacion-web-peliculas/database/infinitycinema_bd.sql**

- configuracion de la base de datos :
**aplicacion-web-peliculas/config/configDB.php**

		<?php
			  define ('DB_HOST', 'localhost');
			  define ('DB_USER', 'root');
			  define ('DB_PASSWORD', '');
			  define ('DB_NAME', 'infinitycinema_bd');
			  define ('DB_CHARSET', 'utf8');
		?>
		

- configuracion base de las rutas :
**aplicacion-web-peliculas/config/configControllers.php**

		<?php
			define ('BASE_DIR', "http://localhost/infinitycinema/");
			define ('CONTROLLERS_DIR', "controllers/");
			define ('DEFAULT_CONTROLLER', "App");
			define ('DEFAULT_ACTION', "index");

			/* rutas */
			define ('MOVIES_DIR', "http://localhost/infinitycinema/App/peliculas/");
		?>
		

- Estilos de Fuentes, colores, etc  :
**aplicacion-web-peliculas/assets/css/root.css**

		:root {
			/* colores */
			--color-black-primary: #000000;
			--color-black-primary-80: rgba(0, 0, 0, 0.80);
			--color-black-primary-50: rgba(0, 0, 0, 0.50);
			--color-black-secondary: #1F1F1F;
			--color-black-container: #282828;
			--color-red-accent: #D12626;
			--color-white-text: rgb(252, 252, 252);
			--color-white-text-85: rgb(255, 255, 255, .85);
			--color-grey-bg: rgba(240, 240, 240, 0.85);
			--color-red-accent-50: rgb(207, 38, 38, .5);
			--color-green-text: #019e0e;
			/* tamaño de fuente */
			--font-size-big: 35px;
			--font-size-big-30: 30px;
			--font-size-big-25: 25px;
			--font-size-big-20: 20px;
			--font-size-medium: 18px;
			--font-size-medium-16: 16px;
			--font-size-small: 13px;
		}
		

- agregar nuevas funcionalidades:

1. crear el respectivo modulo en **"aplicacion-web-peliculas/models/"**
2. crear el respectivo controlador en **"aplicacion-web-peliculas/controllers/"**
3. crear la respectiva vista en **"aplicacion-web-peliculas/views/"**

- Ejemplo de nueva funcionalidad

modulo:

1. - crear ***modelo*** en su respectiva ruta con el nombre:**NombreModel.php**
estrutura:
			
			<?php
				require_once  'database/DatabaseMysql.php';
			
				class NuevoModel extends DatabaseMysql{
					public function nombreFuncion(){
						#codigo...
					}
					
					#funciones..
				}

2. - crear ***controlador*** en su respectiva ruta con el nombre:**NombreController.php**
estrutura:
			
			<?php
				require_once  'database/DatabaseMysql.php';
				
				class NuevoController{
					public function nombreFuncion(){
						#codigo...
					}
					
					#funciones..
				}

3. - crear ***vista*** en su respectiva ruta con el nombre:**NombreView.php**
estrutura:
		
		
			<?php
				php require_once 'render/BaseLayout.php';
				php BaseLayout::renderHead(); 
				php BaseLayout::renderHeader(); ?>

						#Codigo html...

				<?php BaseLayout::renderFooter(); 
			?>

### Rutas
                    
Controlador  | Funcion | Ejemplo
------------- | ------------- | -------------
AppController  | index | <?=BASE_DIR?> App/index/ 
AdminController  | dashboard | <?=BASE_DIR?> Admin/dashboard/ 
PeliculasController  | getAllMovies | <?=BASE_DIR?> Peliculas/getAllMovies/ 
UsuarioController  | iniciarSesion | <?=BASE_DIR?> /Usuario/iniciarSesion/ 


Se puede mejorar mucho más :)

