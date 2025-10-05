# PFO2 Web Docker

Este repositorio contiene el proyecto desarrollado en la materia de **Programación Web**, adaptado para ejecutarse en un entorno Docker. Incluye los servicios necesarios para levantar la aplicación y garantizar que funcione correctamente.

---

## 🔹 Contenido

- `docker-compose.yml` – Archivo de configuración de Docker Compose.
- `app_home/` – Carpeta con el código fuente de la aplicación web. **Debe existir y contener tu proyecto web.**
- Otros archivos necesarios para el proyecto.

> ⚠️ Antes de ejecutar, asegúrate de que `app_home/` exista y contenga los archivos de la aplicación web, de lo contrario Nginx no podrá montar el volumen correctamente.

---

## 🔹 Servicios incluidos

1. **Nginx** – Servidor web para servir la aplicación.
2. **MariaDB** – Base de datos para la aplicación.

---

## 🔹 Instrucciones para ejecutar

1. Clonar el repositorio:
```bash
git clone https://github.com/santysanty/pfo2_web_docker.git
cd pfo2_web_docker

