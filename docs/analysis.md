# Trainly

Trainly es una aplicación web que ayudará a los dueños o administradores de un gimnasio a gestionar
fácilmente las partes más importantes de su negocio como los socios, membresías, visitas, venta/compra de productos,
ingresos y egresos, balances, etc.

**Nota**: Las entidades y módulos descritos a continuación son los necesarios para desarrollar el MVP (Minimum Viable Product) de la aplicación, el cual se enfocará en la gestión de socios, membresías y visitas.

<hr>

## Entidades/Modulos de la aplicación

### User
- **Super Admin**: Tiene control total del sistema y puede gestionar todos los gimnasios
- **Gym Admin**: Es el dueño o administrador de un gimnasio específico
- **Datos**:
  - nombre
  - apellido(s)
  - email
  - contraseña
  - rol

### Gym
- Representa cada gimnasio que se registra en la plataforma
- Cuando un usuario con rol "Gym Admin" se registra, automáticamente se crea un gimnasio asociado a ese usuario
- **Datos**:
  - nombre del gimnasio
  - dirección completa
  - teléfono de contacto
- **Relaciones**: Cada Gimnasio pertenece al Usuario que lo administra

### Member/Socio (Cliente del gimnasio)
- Son las personas que van al gimnasio a entrenar día a día
- **Datos**:
  - nombre
  - apellido(s)
  - fecha de nacimiento
  - sexo
  - email (opcional)
  - imagen (opcional)
- **Cómo se relaciona con otras entidades**:
  - Cada socio pertenece a un gimnasio específico
  - Puede contratar múltiples membresías (una a la vez) de un tipo específico y por un período determinado
  - Si no tiene membresía activa, puede entrar al gimnasio pagando una visita del día

### MembershipType
- Representa los diferentes tipos de membresía que un gimnasio ofrece (ej: General, Estudiante, VIP)
- **Datos**:
  - nombre del tipo (ej: "General", "Estudiante", "VIP")
  - períodos disponibles con sus precios (ej: 2 semanas: $300, 1 mes: $500, 3 meses: $1400)
  - disponibilidad (activo/inactivo)
- **Cómo se relaciona**: Cada tipo de membresía pertenece a un gimnasio específico y
  puede tener múltiples períodos con precios diferentes

### Membership
- Es cada membresía que un socio contrata en un gimnasio (no se renueva automáticamente)
- **Datos**:
  - socio (el socio que contrata la membresía)
  - tipo de membresía (el tipo específico que se contrata)
  - período contratado (ej: 1 mes, 3 meses)
  - precio pagado
  - fecha de inicio
  - fecha de vencimiento
  - estado (activo/vencido)
- **Cómo se relaciona**: Cada membresía pertenece a un gimnasio, a un tipo de membresía y a un socio específico

### VisitType
- Representa los diferentes tipos de visitas que un gimnasio ofrece a sus socios
- **Datos**:
  - nombre (ej: estudiante, general, VIP, etc.)
  - precio
- **Cómo se relaciona**: Cada tipo de visita pertenece a un gimnasio específico y puede ser contratado por múltiples socios

### Visit
- Son las entradas ocasionales de los socios que no tienen una membresía activa
- **Información**:
  - fecha y hora
  - tipo de visita (el tipo de visita que se paga)
  - precio
  - socio: el socio que realizó la visita (opcional)
- **Cómo se relaciona**: Cada visita pertenece a un gimnasio y puede estar asociada a un socio específico

## Flujo de trabajo

1. **Admin (Developer)** registra gimnasios en la plataforma
2. **Gym Admin** gestiona su gimnasio específico:
   - Registra nuevos socios
   - Crea y gestiona tipos de membresía con sus períodos y precios
   - Registra y asigna membresías a socios
   - Registra visitas de socios sin membresía activa
3. **Socios** Ingresan al gimnasio:
   - Pueden tener una membresía activa o pagar por una visita del día
   - Si tienen una membresía, deben ingresar su código para validar que está activa
   - Si no tienen membresía, pueden pagar por una visita del día
