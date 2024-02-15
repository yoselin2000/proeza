<aside class="main-sidebar sidebar-light-lightblue elevation-4">
    <a class="brand-link navbar-gray">
        <img src="{{ asset('dist/img/proeza.png') }}" alt="AdminLTE Logo" class="brand-image ml-1">
        <span class="brand-text font-weight-light">SIP|Sistema Integral de PROEZA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Carpetas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>RD</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @if(@Auth::user()->hasAnyPermission(['permissions.index', 'roles.index', 'cities.index', 'agencies.index', 'ranges.index', 'users.index',
                                                    'accounts.index', 'safes.index', 'boxes.index', 'products.index', 'destinations.index', 'categories.index',]))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                Administración
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permissions.index')
                                <li class="nav-item">
                                    <a href="{{ route('permissions.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Permiso
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('roles.index')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Rol
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('cities.index')
                                <li class="nav-item">
                                    <a href="{{ route('cities.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Departamento
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('agencies.index')
                                <li class="nav-item">
                                    <a href="{{ route('agencies.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Sucursal
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ranges.index')
                                <li class="nav-item">
                                    <a href="{{ route('ranges.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Rango
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('users.index')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Usuario
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('accounts.index')
                                <li class="nav-item">
                                    <a href="{{ route('accounts.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Cuentas Corrientes
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('safes.index')
                                <li class="nav-item">
                                    <a href="{{ route('safes.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Bovedas
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('boxes.index')
                                <li class="nav-item">
                                    <a href="{{ route('boxes.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Cajas
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('products.index')
                                <li class="nav-item">
                                    <a href="{{ route('products.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Productos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('destinations.index')
                                <li class="nav-item">
                                    <a href="{{ route('destinations.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Destino
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('categories.index')
                                <li class="nav-item">
                                    <a href="{{ route('categories.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Tipo de participante
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                @if(@Auth::user()->hasAnyPermission(['applications.index', 'clients.index', 'participants.index', 'evaluations.index']))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                Creditos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('applications.index')
                                <li class="nav-item">
                                    <a href="{{ route('applications.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Solicitudes
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('clients.index')
                                <li class="nav-item">
                                    <a href="{{ route('clients.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Clientes
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('participants.index')
                                <li class="nav-item">
                                    <a href="{{ route('participants.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Participantes
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evaluations.index')
                                <li class="nav-item">
                                    <a href="{{ route('evaluations.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Evaluacion
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->hasAnyPermission(['assigns.index', 'observeds.index', 'approveds.index', 'rejecteds.index', 'disbursements.index']))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                Revisión
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('assigns.index')
                                <li class="nav-item">
                                    <a href="{{ route('assigns.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Asignacion
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('observeds.index')
                                <li class="nav-item">
                                    <a href="{{ route('observeds.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Observacion
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('approveds.index')
                                <li class="nav-item">
                                    <a href="{{ route('approveds.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Aprobacion
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('rejecteds.index')
                                <li class="nav-item">
                                    <a href="{{ route('rejecteds.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Rechazo
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('disbursements.index')
                                <li class="nav-item">
                                    <a href="{{ route('disbursements.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Desembolso
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                @if(@Auth::user()->hasAnyPermission(['evalationsFamily.index']))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                Evaluacion Familia
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('childrens.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Hijos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('references.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Referencias
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('home_addresses.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Direccion de Domicilio
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('warranties.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Tipo de Garantias
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('elements.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Tipos de Bien
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('documents.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Tipos de Documentos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('receptions.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Recepcion de Documentos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('archive_types.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Tipo de Archivos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('archives.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Archivos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('asset_types.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Tipo de Activos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('passive_types.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Tipos de Pasivos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('family_fixed_assets.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Activos Fijos Familia
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('family_passives.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Pasivos Familia
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('expense_types.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Tipo de Gastos Operativos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('family_expenses.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Gastos Operativos Familia
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('evaluation_assets.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Activos Familia (Ev)                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('evaluation_passives.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Pasivos Familia (Ev)
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('caedecs.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            CAEDEC
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('evalationsFamily.index')
                                <li class="nav-item">
                                    <a href="{{ route('activities.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Activivdades Economicas
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                @if(@Auth::user()->hasAnyPermission(['activities.index']))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                Actividad economica
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('inventories.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Inventario
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('average_sales.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Tipo de Venta
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('sales.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Ventas
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('cashes.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Detalle de Efectivo
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('shoppings.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Detalle de Compra
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('saleDetails.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Detalle Ventas
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('complement_types.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Tipo Informacion
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('complements.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Informacion Adicional
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('business_expenses.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Gastos Operativos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('business_current_assets.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Activos Corrientes
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('business_fixed_assets.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Activos Fijos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('business_passives.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Pasivos del Negocio
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('debts.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Pasivos a corto y largo plazo
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('business_addresses.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Direccion del Negocio
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('articles.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Articulos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('supplies.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Insumos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('vehicles.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Vehiculos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('component_details.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Detalle de Componentes
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('components.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Componentes
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('transports.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Transporte
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('transport_details.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Detalle de Transporte
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('maintenance_details.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Detalle de Mantenimiento
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('maintenances.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Mantenimiento
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('activities.index')
                                <li class="nav-item">
                                    <a href="{{ route('companies.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Empresa
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif
                @if(@Auth::user()->hasAnyPermission(['credits.index', 'paymentPlans.index', 'recoveries.index']))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                Cartera
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('credits.index')
                                <li class="nav-item">
                                <a href="{{ route('credits.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-check"></i>
                                    <p>
                                        Creditos
                                    </p>
                                </a>
                            </li>
                            @endcan
                            @can('paymentPlans.index')
                                <li class="nav-item">
                                <a href="{{ route('paymentPlans.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-check"></i>
                                    <p>
                                        Plan de Pagos
                                    </p>
                                </a>
                            </li>
                            @endcan
                            @can('recoveries.index')
                                <li class="nav-item">
                                <a href="{{ route('recoveries.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-check"></i>
                                    <p>
                                        Recuperaciones
                                    </p>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->hasAnyPermission(['usrApplications.index', 'usrAssigns.index', 'usrDisbursements.index', 'usrAssignments.index']))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                Personalizados
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('usrApplications.index')
                                <li class="nav-item">
                                    <a href="{{ route('usrApplications.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Solicitudes
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('usrAssigns.index')
                                <li class="nav-item">
                                    <a href="{{ route('usrAssigns.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Asignadas
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('usrDisbursements.index')
                                <li class="nav-item">
                                    <a href="{{ route('usrDisbursements.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Desembolsadas
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('usrRecoveries.index')
                                <li class="nav-item">
                                    <a href="{{ route('usrRecoveries.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Cobros
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('usrAssignments.index')
                                <li class="nav-item">
                                    <a href="{{ route('usrAssignments.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Asignaciones
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->hasAnyPermission(['elementCategories.index', 'companyElements.index', 'elementComponents.index', 'assignments.index', 'returnComponents.index', 'maintenanceHistories.index']))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                Activos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('elementCategories.index')
                                <li class="nav-item">
                                    <a href="{{ route('elementCategories.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Categoria de articulos
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('companyElements.index')
                                <li class="nav-item">
                                    <a href="{{ route('companyElements.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Articulos Empresa
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('elementComponents.index')
                                <li class="nav-item">
                                    <a href="{{ route('elementComponents.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Componentes Empresa
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('assignments.index')
                                <li class="nav-item">
                                    <a href="{{ route('assignments.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Asignaciones
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('returnComponents.index')
                                <li class="nav-item">
                                    <a href="{{ route('returnComponents.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Devolucion
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('maintenanceHistories.index')
                                <li class="nav-item">
                                    <a href="{{ route('maintenanceHistories.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>
                                            Historial de mantenimiento
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>

