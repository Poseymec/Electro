

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
      <a href="#" class="brand-link">
     <img src="{{asset('logo/logo7.png')}}" alt="logo">

    </a>
    <!-- Sidebar -->
     <!-- Sidebar -->
     @if (Route::has('login'))
     @auth
         {{--
         $premiereLettre=strtoupper(substr(Auth::user()->name,0,1));
         --}}
  
     <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="profil-image" style="width: 40px;height:40px;border:2px solid #a06a05;background-color: #ffffff;display: flex;align-items: center;justify-content: center;font-size: 25px;font-weight: 700;color: #dd9207;border-radius: 50%;">
          {{strtoupper(substr(Auth::user()->name,0,1));}}
        </div>
        <div class="info">
          <a href="#" class="d-block" style="font-size: 20px;">{{ Auth::user()->name }} </a>
        </div>
      </div>
      @endauth
      @endif
   
    <nav class="mt-2">
      <!-- Sidebar Menu -->
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview  {{request()->is('admin')? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{request()->is('admin')? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de Bord
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin')}}"class="nav-link {{request()->is('admin')? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tableau de Bord v1</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview {{request()->is('admin/addcategory' )||request()->is('admin/category' )? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{request()->is('admin/addcategory' )||request()->is('admin/category' )? 'active' : ''}} ">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/addcategory')}}" class="nav-link {{request()->is('admin/addcategory')? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Ajouter une Categorie</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/category')}}" class="nav-link {{request()->is('admin/category')? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview  {{request()->is('admin/addslider' )||request()->is('admin/slider' )? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{request()->is('admin/addslider' )||request()->is('admin/slider' )? 'active' : ''}}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Sliders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/addslider')}}" class="nav-link {{request()->is('admin/addslider')? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Ajouter un slider</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/slider')}}" class="nav-link {{request()->is('admin/slider')? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview   {{request()->is('admin/addproduct' )||request()->is( 'admin/product')? 'menu-open' : ''}}">
            <a href="#" class="nav-link  {{request()->is('admin/addproduct' )||request()->is( 'admin/product')? 'active' : ''}}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Produits
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/addproduct')}}" class="nav-link {{request()->is('admin/addproduct')? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Ajouter un produit</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/product')}}"class="nav-link {{request()->is('admin/product')? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Produits</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview   {{request()->is('admin/addpromo' )||request()->is( 'admin/promo')? 'menu-open' : ''}}">
            <a href="#" class="nav-link  {{request()->is('admin/addpromo' )||request()->is( 'admin/promo')? 'active' : ''}}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Promotion
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/addpromo')}}" class="nav-link {{request()->is('admin/addpromo')? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Ajouter une Promotion</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/promo')}}" class="nav-link {{request()->is('admin/promo')? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Promotions</p>
                </a>
              </li>
            </ul>
          </li>
       
            
          @auth
          @role('super-Admin')
        
  
          <li class="nav-item has-treeview   {{request()->is('admin/roles' )||request()->is( 'admin/permissions')||request()->is( 'admin/assignroletopermission')? 'menu-open' : ''}}">
            <a href="#" class="nav-link  {{request()->is('admin/roles' )||request()->is( 'admin/permissions')||request()->is( 'admin/assignroletopermission')? 'active' : ''}}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Roles et Permission
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/roles')}}" class="nav-link {{request()->is('admin/roles')? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/permissions')}}" class="nav-link {{request()->is('admin/permissions')? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Permissions</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/assignroletopermission')}}" class="nav-link {{request()->is('admin/assignroletopermission')? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>assignation</p>
                </a>
              </li>
            </ul>
          </li>
          @endrole
          @endauth
          @if (Route::has('login'))
            @auth
               
          <li >
            <form action="{{url('auth/logout')}}" method="POST">
              @csrf
              <button  name="logout"  style="background:#ffffff; color:rgb(201, 11, 11);border-raduis:10%; margin-top:15px;margin-left:15px ">Deconnexion</button>
            </form>
          </li>
        </aside> @endauth
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->