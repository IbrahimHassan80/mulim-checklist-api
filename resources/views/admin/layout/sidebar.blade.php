  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
  

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @role('Super admin')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiess"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-user-shield"></i>
        <span>Admins</span>
    </a>
    <div id="collapseUtilitiess" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="{{route('admin.add')}}">Add Admin</a>
            <a class="collapse-item" href="{{route('admin.show')}}">show Admins</a>
        </div>
        
    </div>
</li>
@endrole
    
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-users"></i>
        <span>users</span>
    </a>  
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="{{route('admin.add.user')}}">Add User</a>
            <a class="collapse-item" href="{{route('show.user')}}">show users</a>
        </div>
    </div>
</li>


<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-quran"></i>
            <span>Al azkar</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{route('azkar.sabah')}}">Azkar Alsabah</a>
                <a class="collapse-item" href="{{route('azkar.masaa')}}">Azkar Almasaa</a>
                <a class="collapse-item" href="{{route('azkar.nooom')}}">Azkar Alnoom</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->

{{-- wfffff --}}

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseproduct"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-mosque"></i>
        <span>Alsalawat</span>
    </a>
    
    <div id="collapseproduct" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="{{route('alsalawat')}}">Alsalawat</a>
            
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
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="{{route('questions')}}">Questions</a>
        </div>
    </div>
</li> --}}


<!-- Divider -->
    <hr class="sidebar-divider">
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar ------------------------------>