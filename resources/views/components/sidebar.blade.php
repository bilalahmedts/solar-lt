<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-header">SOLAR LT CAMPAIGNS</li>
        <li class="nav-item">
            <a href="{{ route('audit.index') }}" class="nav-link">
                <i class="nav-icon far fa fa-balance-scale"></i>
                <p>
                    Solar LT Audits
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('voice-evaluations.index') }}" class="nav-link">
                <i class="nav-icon far fa fa-check"></i>
                <p>
                    Evaluation Points
                </p>
            </a>
        </li>
        <li class="nav-header">REPORTS</li>
        <li class="nav-item">
            <a href="{{ route('audit.report') }}" class="nav-link">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                     Evaluation Report
                </p>
            </a>
        </li>
        @if (in_array(Auth::user()->roles[0]->name, ['Super Admin']))
        <li class="nav-header">SETTINGS</li>
        <li class="nav-item">
            <a href="{{ route('campaigns.index') }}" class="nav-link">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                    Campaigns Management
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Users Management
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Roles</p>
                    </a>
                </li>
@endif
            </ul>
        </li>
    </ul>
</nav>
