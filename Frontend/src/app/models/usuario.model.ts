export interface Usuario {
  id: number;
  nombre: string;
  email: string;
  rol: string;
  activo: boolean;
  fechaCreacion?: string;
}

export interface Rol {
  id: number;
  nombre: string;
  descripcion?: string;
}

export interface Area {
  id: number;
  nombre: string;
  codigo?: string;
}

export interface Proyecto {
  id: number;
  nombre: string;
  areaId: number;
  estado: string;
  fechaInicio?: string;
}

export interface Actividad {
  id: number;
  nombre: string;
  proyectoId: number;
  fase: string;
  estado: string;
}

export interface Documento {
  id: number;
  nombre: string;
  tipo: string;
  actividadId?: number;
  url?: string;
}
