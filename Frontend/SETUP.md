# AdminLTE Angular - Configuración y Estructura

## 1. Estructura de carpetas

```
src/
├── app/
│   ├── core/
│   │   ├── layout/
│   │   │   ├── header/          # HeaderComponent
│   │   │   ├── sidebar/         # SidebarComponent
│   │   │   └── footer/          # FooterComponent
│   │   └── services/
│   │       ├── layout.service.ts
│   │       └── usuario.service.ts
│   ├── pages/
│   │   ├── dashboard/
│   │   ├── usuarios/
│   │   ├── roles/
│   │   ├── areas/
│   │   ├── proyectos/
│   │   ├── actividades/
│   │   └── documentos/
│   ├── shared/
│   │   └── components/
│   ├── models/
│   │   └── usuario.model.ts     # Interfaces (Usuario, Rol, Area, etc.)
│   ├── app.component.ts
│   ├── app.component.html
│   ├── app.config.ts
│   └── app.routes.ts
├── assets/
│   └── adminlte/                # Imágenes y CSS adicionales AdminLTE
├── styles.scss                  # Estilos globales (Bootstrap + AdminLTE)
├── index.html
└── main.ts
```

## 2. Comandos para crear/ejecutar el proyecto

```bash
# Crear proyecto (ya ejecutado)
npx @angular/cli@17 new adminlte-angular --routing --style=scss --ssr=false --skip-git --skip-tests

# Instalar dependencias
cd adminlte-angular
npm install bootstrap bootstrap-icons adminlte

# Servidor de desarrollo
npm start
# o
ng serve

# Compilar producción
ng build

# Abrir en el navegador
# http://localhost:4200
```

## 3. Rutas configuradas

| Ruta         | Componente    |
|-------------|---------------|
| `/`         | Redirige a /dashboard |
| `/dashboard`| DashboardComponent |
| `/usuarios` | UsuariosComponent |
| `/roles`    | RolesComponent |
| `/areas`    | AreasComponent |
| `/proyectos`| ProyectosComponent |
| `/actividades` | ActividadesComponent |
| `/documentos`  | DocumentosComponent |
| `**`        | Redirige a /dashboard |

## 4. Layout principal

```
AppComponent
 ├── Header (navbar fijo, toggle sidebar, usuario)
 ├── Sidebar (menú con enlaces a cada sección)
 └── content-wrapper
      ├── RouterOutlet (contenido de cada ruta)
      └── Footer
```

## 5. Estilos globales (styles.scss)

- **Bootstrap 5**: `@import 'bootstrap/scss/bootstrap';`
- **Bootstrap Icons**: `@import 'bootstrap-icons/font/bootstrap-icons.css';`
- **AdminLTE**: Estilos de layout (wrapper, sidebar, header, content-wrapper, footer) definidos en el mismo archivo para compatibilidad con Bootstrap 5.

## 6. Bonus incluido

- **UsuarioService** (mock): `getAll()`, `getById()`, `getCount()` con datos de ejemplo.
- **Interfaces TypeScript** en `app/models/usuario.model.ts`: `Usuario`, `Rol`, `Area`, `Proyecto`, `Actividad`, `Documento`.
- **LayoutService**: toggle del sidebar (colapsar/expandir).
- **Lazy loading**: las páginas se cargan bajo demanda vía `loadComponent()`.

## 7. Assets AdminLTE

Los recursos propios de AdminLTE (imágenes, CSS extra) van en:

```
src/assets/adminlte/
```

Puedes copiar ahí, por ejemplo, `img/` y referenciar en templates como `assets/adminlte/img/logo.png`.
