import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterLink } from '@angular/router';
import { UsuarioService } from '../../core/services/usuario.service';

interface DashboardCard {
  title: string;
  count: number;
  icon: string;
  color: string;
  route: string;
}

@Component({
  selector: 'app-dashboard',
  standalone: true,
  imports: [CommonModule, RouterLink],
  templateUrl: './dashboard.component.html',
  styleUrl: './dashboard.component.scss'
})
export class DashboardComponent implements OnInit {
  cards: DashboardCard[] = [
    { title: 'Usuarios', count: 0, icon: 'bi-people', color: 'info', route: '/usuarios' },
    { title: 'Roles / Perfiles', count: 3, icon: 'bi-person-badge', color: 'success', route: '/roles' },
    { title: 'Áreas', count: 5, icon: 'bi-folder', color: 'warning', route: '/areas' },
    { title: 'Proyectos', count: 12, icon: 'bi-folder2-open', color: 'primary', route: '/proyectos' },
    { title: 'Fases', count: 8, icon: 'bi-diagram-3', color: 'secondary', route: '/proyectos' },
    { title: 'Actividades', count: 45, icon: 'bi-list-task', color: 'danger', route: '/actividades' },
    { title: 'Documentos', count: 128, icon: 'bi-file-earmark-text', color: 'dark', route: '/documentos' }
  ];

  constructor(private usuarioService: UsuarioService) {}

  ngOnInit(): void {
    this.usuarioService.getCount().subscribe(count => {
      this.cards[0].count = count;
    });
  }
}
