## ComeToHome 
CometoHome es un sistema muy básico para gestionar programas, matriculas,inscripciones, estudiantes y asistencias  usando el lenguaje de programación PHP con la base de datos MySQL.

*Características:*

- [x] Visualización y descarga de reportes 
- [x] Crear, leer, actualizar y eliminar registros 
- [x] Backup de la base de datos 

<br><br>
A continuación una breve descripción de la aplicación:
<br><br>
La aplicación cuenta con los siguientes perfiles:

 * Administrador
 * Profesor
 * Estudiante

Cada uno de estos perfiles cuentan con opciones que ofrecen al usuario de las herramientas básicas necesarias para la gestión y optimización del tiempo.

<br><br>
### Página de inicio

Es la página principal de la aplicación donde encontramos los cursos disponibles e inicio de sesión.

<br><br>
### Perfil de Administrador
Este perfil cuenta con el nivel más alto en la aplicación, puede realizar lectura, escritura, edición, busqueda entre otras funciones como la descarga de reportes y backup de la base de datos.

| Página | Descripción corta |
| ------ | ------ |
| Inicio | Una lista de 10 reportes para su descarga y reportes visuales de la aplicación en tiempo real.
| Usuarios | Registro de usuarios,visualización, edición y eliminación de estos.
| Sedes | Registro de sedes,visualización, edición y eliminación de estas.
| Programas | Registrar de programas, visualización y edición  de estos.
| Matrículas | Un listado con los usuarios matriculados y los pendientes por matricular, un buscador de alumnos matriculados por ID o Nombre.
| Profesores | Registro de profesores, visualización de información personal sobre estos y edición .
| Asistencia profesores |  .
| Clases | .
| Alumnos |.
| Asistencia alumnos | .
| Eventos | .
| Configuración |.

#### Detalles:
> Lorem pisum.

<br><br>
### Perfil de Profesores
Este perfil cuenta con el nivel más alto en la aplicación, puede realizar lectura, escritura, edición, busqueda entre otras funciones como la descarga de reportes y backup de la base de datos.

| Página | Descripción corta |
| ------ | ------ |
| Inicio | .
| Usuarios | .
| Sedes | .

##### Detalles:
> Lorem pisum.

<br><br>
### Perfil de Estudiantes
Este perfil cuenta con el nivel más alto en la aplicación, puede realizar lectura, escritura, edición, busqueda entre otras funciones como la descarga de reportes y backup de la base de datos.

| Página | Descripción corta |
| ------ | ------ |
| Inicio | .
| Usuarios | .
| Sedes | .

##### Detalles: 
> Lorem pisum.

<br><br>

## Installation

ComeToHome requiere de  [Node.js](https://nodejs.org/) v10+ to run.

Install the dependencies and devDependencies and start the server.

```sh
cd dillinger
npm i
node app
```

For production environments...

```sh
npm install --production
NODE_ENV=production node app
```



## Development

Want to contribute? Great!

Dillinger uses Gulp + Webpack for fast developing.
Make a change in your file and instantaneously see your updates!

Open your favorite Terminal and run these commands.

First Tab:

```sh
node app
```

Second Tab:

```sh
gulp watch
```

(optional) Third:

```sh
karma test
```

#### Building for source

For production release:

```sh
gulp build --prod
```

Generating pre-built zip archives for distribution:

```sh
gulp build dist --prod
```

## License

MIT
