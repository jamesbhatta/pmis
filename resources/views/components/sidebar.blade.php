<div class="py-4 pl-5">
    <img class="img-reponsive" src="{{ asset(config('constants.nep_gov.logo_sm')) }}" alt="Nepal Government Logo" height="80px">
</div>
<div id="sidenav-wrapper">
    <ul id="sidenav" class="nav flex-column font-noto">
        <li class="nav-item {{ setActive('dashboard') }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="text-warning"><i class="fa fa-tachometer-alt"></i></span>@lang('navigation.dashboard')
            </a>
        </li>

        <!-- <li class="nav-item ">
            <a class="nav-link" href="">
                <span class="text-"><i class="fa fa-plus"></i></span>Projects
            </a>
        </li> -->
        @if (auth()->user()->user_type == 'division')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('project.index') }}">
                <span><i class="far fa-circle"></i></span>Projects
            </a>
        </li>
        @endif
        @hasanyrole('super-admin|admin')
        <li class="nav-item {{ setActive('project.index') }}">
            <a href="{{route('project.index')}}" aria-expanded="false" class="nav-link"><span class="text-success"><i class="fal fa-file-chart-line"></i></span>@lang('navigation.Projects')</a>
        </li>
        @endhasrole
        <li class="nav-item {{ setActive('report') }}">
            <a class="nav-link" href="{{ route('report') }}">
                <span class="text-success"><i class="fa fa-chart"></i></span>Report
            </a>
        </li>  
        @hasrole('super-admin')
        <li class="nav-item {{ setActive('organization.index') }}">
            <a class="nav-link" href="{{ route('organization.index') }}">
                <span class="text-success"><i class="fa fa-plus"></i></span>@lang('navigation.Organizations')
            </a>
        </li>
        @endhasrole

        @can('user.*')
        <li class="nav-item {{ setActive('user.index') }} {{ setActive('user.create') }} {{ setActive('user.edit') }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <span class=""><i class="fa fa-users"></i></span>@lang('navigation.users')
            </a>
        </li>
        @endcan

        @hasanyrole('super-admin|admin')
        <li class="nav-item {{ setActive('settings.index') }}">
            <a class="nav-link" href="{{ route('settings.index') }}">
                <span class="amber-text"><i class="fas fa-cogs"></i></span>@lang('navigation.settings')
            </a>
        </li>
        @endhasrole



        <li class="nav-item">
            <a class="nav-link" href="#!">
                <span class="text-default"><i class="fas fa-tools"></i></span>@lang('navigation.configurations')</a>
        </li>

        <li class="nav-item pl-5 {{ setActive('project-type.*') }}">
            <a class="nav-link" href="{{ route('project-type.index') }}">@lang('navigation.project_type')</a>
        </li>
        @hasanyrole('super-admin|admin')
        <li class="nav-item pl-5 {{ setActive('fiscal-year.*') }}">
            <a class="nav-link" href="{{ route('fiscal-year.index') }}">@lang('navigation.fiscal_year')</a>
        </li>
        @endhasanyrole
        @can('province.*')
        <li class="nav-item pl-5 {{ setActive('province.*') }}">
            <a class="nav-link" href="{{ route('province.index') }}">@lang('navigation.province')</a>
        </li>
        @endcan
        @can('district.*')
        <li class="nav-item pl-5 {{ setActive('district.*') }}">
            <a class="nav-link" href="{{ route('district.index') }}">@lang('navigation.district')</a>
        </li>
        @endcan
        @can('municipality.*')
        <li class="nav-item pl-5 {{ setActive('municipality.*') }}">
            <a class="nav-link" href="{{ route('municipality.index') }}">@lang('navigation.municipality')</a>
        </li>
        @endcan
        <li class="nav-item pl-5 {{ setActive('ward.*') }}">
            <a class="nav-link" href="{{ route('ward.index') }}">@lang('navigation.ward')</a>
        </li>

        @hasanyrole('super-admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logs') }}" target="_blank">
                <span class="text-info"><i class="fas fa-exclamation-triangle"></i></span>@lang('System Logs')
            </a>
        </li>
        @endhasanyrole

    </ul>
</div>