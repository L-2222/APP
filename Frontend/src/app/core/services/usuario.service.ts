import { Injectable } from '@angular/core';
import { Observable, of } from 'rxjs';
import { Usuario } from '../../models/usuario.model';

@Injectable({
  providedIn: 'root'
})
export class UsuarioService {
  private usuariosMock: Usuario[] = [
    { id: 1, nombre: 'Juan Pérez', email: 'juan@ejemplo.com', rol: 'Administrador', activo: true, fechaCreacion: '2024-01-15' },
    { id: 2, nombre: 'María García', email: 'maria@ejemplo.com', rol: 'Editor', activo: true, fechaCreacion: '2024-02-20' },
    { id: 3, nombre: 'Carlos López', email: 'carlos@ejemplo.com', rol: 'Usuario', activo: false, fechaCreacion: '2024-03-10' },
    { id: 4, nombre: 'Ana Martínez', email: 'ana@ejemplo.com', rol: 'Editor', activo: true, fechaCreacion: '2024-04-05' },
    { id: 5, nombre: 'Luis Rodríguez', email: 'luis@ejemplo.com', rol: 'Usuario', activo: true, fechaCreacion: '2024-05-12' }
  ];

  getAll(): Observable<Usuario[]> {
    return of([...this.usuariosMock]);
  }

  getById(id: number): Observable<Usuario | undefined> {
    const usuario = this.usuariosMock.find(u => u.id === id);
    return of(usuario ? { ...usuario } : undefined);
  }

  getCount(): Observable<number> {
    return of(this.usuariosMock.length);
  }
}
