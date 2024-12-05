# Prueba Técnica - Jairo Marín

**Autor:** Jairo Marín  
**Correo:** jairomarinx@hotmail.com  
**WhatsApp:** +573134039789  

---

## Descripción
Este proyecto es una prueba técnica desarrollada con Laravel. Incluye un contenedor Docker para facilitar el despliegue y pruebas, 
así como documentación detallada para su configuración y uso.

---

## URL de Despliegue
El proyecto está desplegado en el siguiente enlace:

http://linktic.jairomarin.com/


Las credenciales de acceso al servidor de despliegue se han compartido por correo.

---

## URL de Postman
Una colección de Postman para probar los endpoints del proyecto está disponible en el siguiente enlace:
https://tinyurl.com/2em3xvfj
https://tinyurl.com/2em3xvfj

---

## Instalación y Configuración del Proyecto

### Requisitos 
1. Tener instalado **Docker** y **Docker Compose**.
2. Tener configurado **Composer** en tu sistema.
3. Tener **MySQL** instalado localmente 

### Clonar el Repositorio

```bash
git clone https://github.com/jairomarinx/linktic.git
cd linktic
```

### Configurar Variables de Entorno


Personalizar el archivo .env
```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
```

### Instalar Dependencias
Ejecuta el siguiente comando para instalar las dependencias del proyecto:
```bash
composer install
```

### Generar la Clave de la Aplicación
Genera una clave de aplicación para Laravel:
```bash
php artisan key:generate
```

### Ejecutar Migraciones
Corre las migraciones para configurar la base de datos:
```bash
php artisan migrate
```

---

## Uso de Docker

### Construir y Ejecutar el Contenedor
Para iniciar el contenedor Docker, ejecuta el siguiente comando:
```bash
docker-compose up --build
```


Resumen:

1. Diagrama de Arquitectura

Miro Diagram:  https://miro.com/welcomeonboard/cHFOUmh1N2gvRXFNcWlLdVZtdGhzaDgyVzN5N2hSQTlrTnB0eW5aWld4cVZ5R3hMSFQ1eE12dWlLbDZBMTJhQXk1b0JzdGtPZTRjQWRCUUVxc09veWlWMUl2Vkd0RExvUVRveGxtbFJIZExiTzJ4VkJpL010aW41ZWNPRVFNZ1QhZQ==?share_link_id=80830151656

2. Github repository:
    https://github.com/jairomarinx/linktic

3. Documentacion postman:
    https://tinyurl.com/2em3xvfj

4. Manejo de errores
    IMplementados dentro de los EndPoints y documentado en postman 

5.Dockerfile y Docker Compose en este repositorio 

Bonus
  *.Despliegue: Se encuentra despplegado en mi servidor de DigitalOcean y puesto en el subdominio
    linktic.jairomarin.com 

  *Excel export: http://linktic.jairomarin.com/excel-products
                 http://linktic.jairomarin.com/excel-orders  

code: ExcelController.php 
  
---

## Contacto
Si tienes dudas o necesitas soporte, no dudes en contactarme a través de:
- **Correo:** jairomarinx@hotmail.com  
- **WhatsApp:** +573134039789

