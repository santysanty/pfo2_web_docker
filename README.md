# PFO2 Web Docker

Este repositorio contiene el proyecto desarrollado en la materia de **Programación Web**, adaptado para ejecutarse en un entorno Docker. Incluye los servicios necesarios para levantar la aplicación y garantizar que funcione correctamente.

---

## 🔹 Contenido

- `docker-compose.yml` – Archivo de configuración de Docker Compose.
- `app_home/` – Carpeta con el código fuente de la aplicación web.
- `nginx/` – Configuración del servidor Nginx.
- `db_data/` – Volumen para persistencia de MariaDB.
- `initdb/` – Scripts de inicialización de la base de datos.
- `README.md` – Este archivo.

> ⚠️ Todas las carpetas necesarias (`app_home/`, `nginx/`, `db_data/`, `initdb/`) ya están incluidas en el repositorio.

---

## 🔹 Servicios incluidos

1. **Nginx** – Servidor web para servir la aplicación.
2. **PHP-FPM** – Procesa archivos PHP.
3. **MariaDB** – Base de datos para la aplicación.

---

## 🔹 Instrucciones para ejecutar

1. Clonar el repositorio:
```bash
git clone https://github.com/santysanty/pfo2_web_docker.git
cd pfo2_web_docker


