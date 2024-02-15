<nav class="main-header navbar navbar-expand navbar-dark navbar-gray">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        @if(Auth::user()->hasAnyPermission(['permissions.index', 'roles.index', 'cities.index', 'agencies.index', 'ranges.index', 'users.index',
                                            'accounts.index', 'safes.index', 'boxes.index', 'products.index', 'destinations.index', 'categories.index']))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown">
                    Administración
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                    @can('permissions.index')
                        <a class="dropdown-item" href="{{ route('permissions.index') }}">Permiso</a>
                    @endcan
                    @can('roles.index')
                        <a class="dropdown-item" href="{{ route('roles.index') }}">Rol</a>
                    @endcan
                    @can('cities.index')
                        <a class="dropdown-item" href="{{ route('cities.index') }}">Departamento</a>
                    @endcan
                    @can('agencies.index')
                        <a class="dropdown-item" href="{{ route('agencies.index') }}">Sucursal</a>
                    @endcan
                    @can('ranges.index')
                        <a class="dropdown-item" href="{{ route('ranges.index') }}">Rango</a>
                    @endcan
                    @can('users.index')
                        <a class="dropdown-item" href="{{ route('users.index') }}">Usuario</a>
                    @endcan
                    @can('accounts.index')
                        <a class="dropdown-item" href="{{ route('accounts.index') }}">Cuentas Corrientes</a>
                    @endcan
                    @can('safes.index')
                        <a class="dropdown-item" href="{{ route('safes.index') }}">Bovedas</a>
                    @endcan
                    @can('boxes.index')
                        <a class="dropdown-item" href="{{ route('boxes.index') }}">Cajas</a>
                    @endcan
                    @can('boxes.index')
                        <a class="dropdown-item" href="{{ route('boxes.index') }}">Productos</a>
                    @endcan
                    @can('destinations.index')
                        <a class="dropdown-item" href="{{ route('destinations.index') }}">Destino</a>
                    @endcan
                    @can('categories.index')
                        <a class="dropdown-item" href="{{ route('categories.index') }}">Tipo de participante</a>
                    @endcan
                </div>
            </li>
        @endif
        @if(Auth::user()->hasAnyPermission(['applications.index', 'clients.index', 'participants.index', 'evaluations.index']))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown">
                    Creditos
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                    @can('applications.index')
                        <a class="dropdown-item" href="{{ route('applications.index') }}">Solicitudes</a>
                    @endcan
                    @can('clients.index')
                        <a class="dropdown-item" href="{{ route('clients.index') }}">Clientes</a>
                    @endcan
                    @can('participants.index')
                        <a class="dropdown-item" href="{{ route('participants.index') }}">Participantes</a>
                    @endcan
                    @can('evaluations.index')
                        <a class="dropdown-item" href="{{ route('evaluations.index') }}">Evaluacion</a>
                    @endcan
                </div>
            </li>
        @endif
        @if(Auth::user()->hasAnyPermission(['assigns.index', 'observeds.index', 'approveds.index', 'rejecteds.index', 'disbursements.index']))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown">
                    Revisión
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                    @can('assigns.index')
                        <a class="dropdown-item" href="{{ route('assigns.index') }}">Asignacion</a>
                    @endcan
                    @can('observeds.index')
                        <a class="dropdown-item" href="{{ route('observeds.index') }}">Observacion</a>
                    @endcan
                    @can('approveds.index')
                        <a class="dropdown-item" href="{{ route('approveds.index') }}">Aprobacion</a>
                    @endcan
                    @can('rejecteds.index')
                        <a class="dropdown-item" href="{{ route('rejecteds.index') }}">Rechazo</a>
                    @endcan
                    @can('disbursements.index')
                        <a class="dropdown-item" href="{{ route('disbursements.index') }}">Desembolso</a>
                    @endcan
                </div>
            </li>
        @endif
        @if(Auth::user()->hasAnyPermission(['evalationsFamily.index']))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown">
                    Evaluacion Familia
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('childrens.index') }}">Hijos</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('references.index') }}">Referencias</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('home_addresses.index') }}">Direccion de Domicilio</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('warranties.index') }}">Tipo de Garantias</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('elements.index') }}">Tipos de Bien</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('documents.index') }}">Tipos de Documentos</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('receptions.index') }}">Recepcion de Documentos</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('archive_types.index') }}">Tipo de Archivos</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('archives.index') }}">Archivos</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('asset_types.index') }}">Tipo de Activos</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('passive_types.index') }}">Tipos de Pasivos</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('family_fixed_assets.index') }}">Activos Fijos Familia</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('family_passives.index') }}">Pasivos Familia</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('expense_types.index') }}">Tipo de Gastos Operativos</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('family_expenses.index') }}">Gastos Operativos Familia</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('evaluation_assets.index') }}"> Activos Familia (Ev)</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('evaluation_passives.index') }}">Pasivos Familia (Ev)</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('caedecs.index') }}">CAEDEC</a>
                    @endcan
                    @can('evalationsFamily.index')
                        <a class="dropdown-item" href="{{ route('activities.index') }}">Activivdades Economicas</a>
                    @endcan
                </div>
            </li>
        @endif
        @if(Auth::user()->hasAnyPermission(['activities.index']))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown">
                    Actividad economica
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('inventories.index') }}">Inventario</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('average_sales.index') }}">Tipo de Venta</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('sales.index') }}">Ventas</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('cashes.index') }}">Detalle de Efectivo</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('shoppings.index') }}">Detalle de Compra</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('saleDetails.index') }}">Detalle Ventas</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('complement_types.index') }}">Tipo Informacion</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('complements.index') }}">Informacion Adicional</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('business_expenses.index') }}">Gastos Operativos</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('business_current_assets.index') }}">Activos Corrientes</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('business_fixed_assets.index') }}">Activos Fijos</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('business_passives.index') }}"> Pasivos del Negocio</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('debts.index') }}">Pasivos a corto y largo plazo</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('business_addresses.index') }}">Direccion del Negocio</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('articles.index') }}">Articulos</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('supplies.index') }}"> Insumos</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('vehicles.index') }}">Vehiculos</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('component_details.index') }}">Detalle de Componentes</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('components.index') }}">Componentes</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('transports.index') }}">Transporte</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('transport_details.index') }}">Detalle de Transporte</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('maintenance_details.index') }}"> Detalle de Mantenimiento</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('maintenances.index') }}">Mantenimiento</a>
                    @endcan
                    @can('activities.index')
                        <a class="dropdown-item" href="{{ route('companies.index') }}">Empresa</a>
                    @endcan
                </div>
            </li>
        @endif
        @if(Auth::user()->hasAnyPermission(['credits.index', 'paymentPlans.index', 'recoveries.index']))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown">
                    Cartera
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                    @can('credits.index')
                        <a class="dropdown-item" href="{{ route('credits.index') }}">Creditos</a>
                    @endcan
                    @can('paymentPlans.index')
                        <a class="dropdown-item" href="{{ route('paymentPlans.index') }}">Plan de Pagos</a>
                    @endcan
                    @can('recoveries.index')
                        <a class="dropdown-item" href="{{ route('recoveries.index') }}">Recuperaciones</a>
                    @endcan
                </div>
            </li>
        @endif
        @if(Auth::user()->hasAnyPermission(['usrApplications.index', 'usrAssigns.index', 'usrDisbursements.index', 'usrAssignments.index']))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown">
                    Personalizados
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                    @can('usrApplications.index')
                        <a class="dropdown-item" href="{{ route('usrApplications.index') }}">Solicitudes</a>
                    @endcan
                    @can('usrAssigns.index')
                        <a class="dropdown-item" href="{{ route('usrAssigns.index') }}">Asignadas</a>
                    @endcan
                    @can('usrDisbursements.index')
                        <a class="dropdown-item" href="{{ route('usrDisbursements.index') }}">Desembolsadas</a>
                    @endcan
                    @can('usrAssignments.index')
                        <a class="dropdown-item" href="{{ route('usrAssignments.index') }}">Cobros</a>
                    @endcan
                </div>
            </li>
        @endif
        @if(Auth::user()->hasAnyPermission(['elementCategories.index', 'companyElements.index', 'elementComponents.index', 'assignments.index', 'returnComponents.index', 'maintenanceHistories.index']))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown">
                    Activos
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                    @can('elementCategories.index')
                        <a class="dropdown-item" href="{{ route('elementCategories.index') }}">Categoria de articulos</a>
                    @endcan
                    @can('companyElements.index')
                        <a class="dropdown-item" href="{{ route('companyElements.index') }}">Articulos Empresa</a>
                    @endcan
                    @can('elementComponents.index')
                        <a class="dropdown-item" href="{{ route('elementComponents.index') }}">Componentes Empresa</a>
                    @endcan
                    @can('assignments.index')
                        <a class="dropdown-item" href="{{ route('assignments.index') }}">Asignaciones</a>
                    @endcan
                    @can('returnComponents.index')
                        <a class="dropdown-item" href="{{ route('returnComponents.index') }}">Devolucion</a>
                    @endcan
                    @can('maintenanceHistories.index')
                        <a class="dropdown-item" href="{{ route('maintenanceHistories.index') }}">Historial de mantenimiento</a>
                    @endcan
                </div>
            </li>
        @endif
    </ul>
.
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                <a class="dropdown-item" href="{{ route('home') }}">Inicio</a>
                @can('users.updateProfile')
                    <a class="dropdown-item" data-toggle="modal" data-target="#userEditPerfil">Editar Perfil</a>
                @endcan
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesion</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
