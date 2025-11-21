# Sistema de Gestión de Inspecciones del IPV

#### Comisión: 2.1

#### Integrantes: 
- Aveiro Matías 
- González Benjamín 
- Romero Camila

#### Docente: 
- Veron Facundo

Fecha: 24/11/2025

## Resumen ejecutivo
El Sistema de Gestión de Inspecciones del IPV es una aplicación web desarrollada en PHP puro cuyo objetivo es digitalizar y centralizar el registro de inspecciones de viviendas del Instituto Provincial de la Vivienda (IPV). Se resuelven problemas como la falta de registros unificados, demoras por procesos manuales y dificultad para visualizar el estado general de las inspecciones.

El sistema implementa operaciones CRUD sobre inspecciones, estados, tipos de vivienda y usuarios, además de un dashboard con métricas. Incorpora metodologías ágiles, testing con PHPUnit, CI/CD con GitHub Actions, linters, buenas prácticas y documentación.

## Contexto

### Alcance
- Gestión completa de inspecciones.
- Gestión de estados de inspección.
- Asignación de inspectores.
- Dashboard de métricas principales.
- Persistencia con base de datos MySQL.

### Requisitos clave
- CRUD funcional.
- Interfaz clara y navegable.
- Testing básico unitario.
- Pipeline CI/CD activo.
- Documentación completa del proceso.

### Stack tecnológico
- PHP 8+
- MySQL
- Composer (autoloading + dependencias)
- PHPUnit 10
- GitHub Actions (CI/CD)
- HTML + CSS personalizado
- XAMPP
- Jira (gestión ágil)
- PowerBi (ánalisis de datos y metricas)
- Figma (prototipado)
- Laravel (framework)

## Metodologías ágiles

### Marco adoptado
Scrum híbrido, adaptado a un equipo de 3 integrantes.

### Roles
- DBA: Aveiro Matias
- Fronted: Romero Camila
- Backend: González Benjamín

### Artefactos
- Product Backlog
- Sprint Backlog semanal
- Definition of Ready (DoR)
- Definition of Done (DoD)

### Ceremonias
- Sprint Planning semanal
- Daily Scrum por WhatsApp
- Sprint Review al finalizar cada iteración
- Sprint Retrospectivos breves con mejoras

### Tablero
Jira con columnas: To Do → In Progress → Review → Done  
Las capturas se agregan en la documentacion

## Repositorio & versionado

### Estrategia de ramas
- main: rama estable
- feature/...: cada funcionalidad nueva
- hotfix/...: correcciones puntuales

### Convenciones de commits
Se usó Conventional Commits:
- feat: para funcionalidades
- fix: arreglos
- refactor: mejoras internas
- docs: documentación
- test: pruebas

Ejemplo:
feat: agregar módulo de inspecciones

## Testing

### Estrategia
- Unit tests: modelos y conexión
- Integración: pruebas reales hacia MySQL
- E2E: validación manual

### Herramientas
PHPUnit 10

### Integración en CI
GitHub Actions ejecuta:
composer install
composer test

## Calidad y buenas prácticas

### Linters
PHPCS con PSR-12  
Comando:
composer lint

### Seguridad
- Uso de .env y .env.example
- Queries preparadas en PDO
- No subir claves reales

### Principios aplicados
- Separación Model/View/Controller
- Autoload PSR-4
- Código modular

## CI/CD

### Pipeline
Etapas:
1. Checkout
2. Composer install
3. Test + Lint
4. Artefactos y logs

### Archivo principal
name: CI-TEST IPV

    on:
  push:
    branches: ["main"]
  pull_request:
    branches: ["main"]

jobs:
  build:

    runs-on: ubuntu-latest

    steps:
    - name: Checkout del repositorio
      uses: actions/checkout@v3

    - name: Instalar PHP
      uses: shivammathur/setup-php@v2
      with:
        php-version: '8.2'
        extensions: mbstring, pdo, pdo_mysql

    - name: Instalar dependencias (Composer)
      run: composer install --no-interaction --prefer-dist

    - name: Validar sintaxis de PHP
      run: |
        find . -type f -name "*.php" -print0 | xargs -0 -n1 php -l

## Infraestructura & ejecución

### Cómo ejecutar localmente
1. Instalar XAMPP  
2. Clonar repositorio en htdocs  
3. Importar base de datos desde /sql/db_ipv_proyecto.sql  
4. Copiar variables:
cp .env.example .env
5. Acceder:
http://localhost/ipvsistema_php_puro/public/

### Archivo .env.example
DB_HOST=localhost  
DB_NAME=db_ipv_proyecto  
DB_USER=root  
DB_PASS=

## Riesgos y lecciones

### Riesgos
- Falta de experiencia con PHPUnit
- Configuración de autoloading
- Errores de ruta en XAMPP
- Ajustes de permisos

### Lecciones aprendidas
- Las historias pequeñas son más fáciles de gestionar
- La comunicación diaria evita bloqueos
- CI/CD automatiza tareas importantes
- Documentar ahorra tiempo en el equipo
- No ponerse de novio

## Conclusiones y trabajo futuro

### Conclusiones
El sistema cumple los requisitos funcionales del IPV.  
La incorporación de CI/CD y tests incrementó la calidad general.  
El dashboard facilita la interpretación rápida del estado de inspecciones.

### Trabajo futuro
- Autenticación avanzada y roles
- Reportes PDF/Excel
- API REST
- Módulo móvil para inspectores
- Migración futura a Laravel o Flexmind (se vienen cositas((si se pone la 10 Hoferek)))

## Referencias
- PHP Manual
- PHPUnit Docs
- GitHub Actions Docs
- Notas del curso Metodología de Sistemas II
