import { Routes } from '@angular/router';

export const routes: Routes = [
  { path: '', redirectTo: '/dashboard', pathMatch: 'full' },
  { path: 'dashboard', loadComponent: () => import('./pages/dashboard/dashboard.component').then(m => m.DashboardComponent) },
  { path: 'usuarios', loadComponent: () => import('./pages/usuarios/usuarios.component').then(m => m.UsuariosComponent) },
  { path: 'roles', loadComponent: () => import('./pages/roles/roles.component').then(m => m.RolesComponent) },
  { path: 'areas', loadComponent: () => import('./pages/areas/areas.component').then(m => m.AreasComponent) },
  { path: 'proyectos', loadComponent: () => import('./pages/proyectos/proyectos.component').then(m => m.ProyectosComponent) },
  { path: 'actividades', loadComponent: () => import('./pages/actividades/actividades.component').then(m => m.ActividadesComponent) },
  { path: 'documentos', loadComponent: () => import('./pages/documentos/documentos.component').then(m => m.DocumentosComponent) },
  { path: '**', redirectTo: '/dashboard', pathMatch: 'full' }
];
