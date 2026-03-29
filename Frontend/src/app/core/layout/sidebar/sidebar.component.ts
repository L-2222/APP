import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { CommonModule } from '@angular/common';

interface MenuItem {
  label: string;
  route: string;
  icon: string;
  children?: MenuItem[];
}

@Component({
  selector: 'app-sidebar',
  standalone: true,
  imports: [CommonModule, RouterLink, RouterLinkActive],
  templateUrl: './sidebar.component.html',
  styleUrl: './sidebar.component.scss'
})
export class SidebarComponent {
  menuItems: MenuItem[] = [
    { label: 'Dashboard', route: '/dashboard', icon: 'bi-speedometer2' },
    { label: 'Usuarios', route: '/usuarios', icon: 'bi-people' },
    { label: 'Roles', route: '/roles', icon: 'bi-person-badge' },
    { label: 'Áreas', route: '/areas', icon: 'bi-folder' },
    { label: 'Proyectos', route: '/proyectos', icon: 'bi-folder2-open' },
    { label: 'Actividades', route: '/actividades', icon: 'bi-list-task' },
    { label: 'Documentos', route: '/documentos', icon: 'bi-file-earmark-text' }
  ];
}
