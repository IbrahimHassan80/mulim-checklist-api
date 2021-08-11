  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{__('messages.admin_panel')}}<sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{__('messages.INTERFACE')}}
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @role('Super admin')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiess"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-user-shield"></i>
        <span>{{__('messages.admins')}}</span>
    </a>
    <div id="collapseUtilitiess" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{__('messages.custom_utilities')}}:</h6>
            <a class="collapse-item" href="{{route('admin.add')}}">{{__('messages.add_admins')}}</a>
            <a class="collapse-item" href="{{route('admin.show')}}">{{__('messages.show_admins')}}</a>
        </div>

    </div>
</li>
   @endrole
    
   @role('admin')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-users"></i>
        <span>{{__('messages.users')}}</span>
    </a>  
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{__('messages.custom_utilities')}}:</h6>
            <a class="collapse-item" href="{{route('admin.add.user')}}">{{__('messages.add_users')}}</a>
            <a class="collapse-item" href="{{route('show.user')}}">{{__('messages.show_users')}}</a>
        </div>
    </div>
</li>
@endrole

<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-quran"></i>
            <span>{{__('messages.alazkar')}}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{__('messages.custom_utilities')}}:</h6>
                <a class="collapse-item" href="{{route('azkar.sabah')}}">{{__('messages.azkar_alsabah')}}</a>
                <a class="collapse-item" href="{{route('azkar.masaa')}}">{{__('messages.azkar_almasaa')}}</a>
                <a class="collapse-item" href="{{route('azkar.nooom')}}">{{__('messages.azkar_alnoom')}}</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->

{{-- wfffff --}}

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseproduct"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-mosque"></i>
        <span>{{__('messages.Alsalawat')}}</span>
    </a>
    
    <div id="collapseproduct" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{__('messages.custom_utilities')}}:</h6>
            <a class="collapse-item" href="{{route('alsalawat')}}">{{__('messages.Alsalawat')}}</a>
            
        </div>
    </div>
</li>


{{-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tasks"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="far fa-sticky-note"></i>
        <span>Questions</span>
    </a>
    
    <div id="tasks" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{__('messages.custom_utilities')}}:</h6>
            <a class="collapse-item" href="{{route('questions')}}">Questions</a>
        </div>
    </div>
</li> --}}


<!-- Divider -->
    <hr class="sidebar-divider">
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler Sidebar -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar ------------------------------>