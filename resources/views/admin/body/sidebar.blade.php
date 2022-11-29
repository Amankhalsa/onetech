<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->
      @php
          $prefix = Request::route()->getPrefix();
          $route = Route::current()->getName();
      @endphp
      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        <a href="{{url('admin/dashboard')}}" class="sl-menu-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{url('/')}}" class="sl-menu-link " target="_blank">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Website</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link  {{ ($prefix ==  '/admin/category' || $prefix == '/admin/brands' || $prefix =='/admin/Subcategory' )?'active show-sub' : ''}}  ">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Category</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.viewCategory')}}" class="nav-link @if(Route::is('admin.viewCategory') ) active @else '' @endif">Category </a></li>
          <li class="nav-item"><a href="{{route('viewSubCategory')}}" class="nav-link @if(Route::is('viewSubCategory') ) active @else '' @endif">Sub Category </a></li>

          <li class="nav-item"><a href="{{route('admin.viewbrands')}}" class="nav-link @if(Route::is('admin.viewbrands') ) active @else '' @endif">View Brand</a></li>

        </ul>

        <a href="#" class="sl-menu-link {{ ($prefix == '/admin/coupon'  )?'active show-sub' : ''}}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Coupons</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.coupon')}}" class="nav-link @if(Route::is('admin.coupon') ) active @else '' @endif">Coupons</a></li>

        </ul>



        <a href="#" class="sl-menu-link {{ ($prefix == '/admin/product'  )?'active show-sub' : ''}}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Product</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('create_Product')}}" class="nav-link @if(Route::is('create_Product') ) active @else '' @endif">Add Product</a></li>
          <li class="nav-item"><a href="{{route('all_Product')}}" class="nav-link @if(Route::is('all_Product') ) active @else '' @endif">All Product</a></li>
        </ul>


        <a href="#" class="sl-menu-link  {{ ($prefix == '/admin'  )?'active show-sub' : ''}}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Order</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.neworder')}}" class="nav-link @if(Route::is('admin.neworder') ) active @else '' @endif">New Ordder</a></li>
          <li class="nav-item"><a href="{{ route('admin.accept.payment') }}" class="nav-link @if(Route::is('admin.accept.payment') ) active @else '' @endif">Accept Payment </a></li>
          <li class="nav-item"><a href="{{ route('admin.CancelOrder') }}" class="nav-link @if(Route::is('admin.CancelOrder') ) active @else '' @endif">Cancel Order </a></li>
         <li class="nav-item"><a href="{{ route('admin.ProcessPayment') }}" class="nav-link @if(Route::is('admin.ProcessPayment') ) active @else '' @endif">Process Delivery </a></li>
         <li class="nav-item"><a href="{{ route('admin.SuccessPayment') }}" class="nav-link  @if(Route::is('admin.SuccessPayment') ) active @else '' @endif">Delivery Success </a></li>
        </ul>



        {{-- blog  --}}
        <a href="#" class="sl-menu-link {{ ($prefix == '/admin/blog'  )?'active show-sub' : ''}}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Blog</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('blogcategory_list')}}" class="nav-link @if(Route::is('blogcategory_list') ) active @else '' @endif">Blog Category</a></li>
          <li class="nav-item"><a href="{{route('add_Blog_Post')}}" class="nav-link @if(Route::is('add_Blog_Post') ) active @else '' @endif">Add Blog</a></li>
          <li class="nav-item"><a href="{{route('view.blog_post')}}" class="nav-link @if(Route::is('view.blog_post') ) active @else '' @endif">Blog Post</a></li>

        </ul>

 
        {{-- blog end  --}}
 
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Others</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.newsletter')}}" class="nav-link @if(Route::is('admin.newsletter') ) active @else '' @endif">Newsletter</a></li>

          <li class="nav-item"><a href="{{route('admin.seo')}}" class="nav-link @if(Route::is('admin.seo') ) active @else '' @endif">Seo Setting</a></li>

        </ul>
    
        <a href="#" class="sl-menu-link {{ ($prefix == '/admin/orders'  )?'active show-sub' : ''}}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Reports</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.today.orders')}}" class="nav-link @if(Route::is('admin.today.orders') ) active @else '' @endif ">Today Order</a></li>
          <li class="nav-item"><a href="{{route('admin.today.delivery')}}" class="nav-link @if(Route::is('admin.today.delivery') ) active @else '' @endif">Today Delivery</a></li>
          <li class="nav-item"><a href="{{route('admin.this.month')}}" class="nav-link @if(Route::is('admin.this.month') ) active @else '' @endif">This Month</a></li>
          <li class="nav-item"><a href="{{route('admin.search.report')}}" class="nav-link @if(Route::is('admin.search.report') ) active @else '' @endif">Search Report  </a></li>
        </ul>
   
        <a href="#" class="sl-menu-link   {{ ($prefix == '/admin/user'  )?'active show-sub' : ''}}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">User Role</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin_create_users')}}" class="nav-link  ">Create User</a></li>
          <li class="nav-item"><a href="{{route('admin_all_users')}}" class="nav-link ">All User</a></li>
          </ul>

        
        <a href="#" class="sl-menu-link ">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Return Order</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.today.orders')}}" class="nav-link @if(Route::is('admin.today.orders') ) active @else '' @endif ">Return Request</a></li>
          <li class="nav-item"><a href="{{route('admin.today.delivery')}}" class="nav-link @if(Route::is('admin.today.delivery') ) active @else '' @endif">All Request</a></li>
          </ul>
 
          <a href="#" class="sl-menu-link }">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
              <span class="menu-item-label">Contact Message</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.today.orders')}}" class="nav-link @if(Route::is('admin.today.orders') ) active @else '' @endif ">New Message</a></li>
            <li class="nav-item"><a href="{{route('admin.today.delivery')}}" class="nav-link @if(Route::is('admin.today.delivery') ) active @else '' @endif">All Message</a></li>
            </ul>

            <a href="#" class="sl-menu-link ">
              <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Prodcut Comment </span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="{{route('admin.today.orders')}}" class="nav-link @if(Route::is('admin.today.orders') ) active @else '' @endif ">New Comment</a></li>
              <li class="nav-item"><a href="{{route('admin.today.delivery')}}" class="nav-link @if(Route::is('admin.today.delivery') ) active @else '' @endif">All Comment</a></li>
              </ul>
   
              <a href="#" class="sl-menu-link ">
                <div class="sl-menu-item">
                  <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                  <span class="menu-item-label">Site Settings  </span>
                  <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
              <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{route('admin.site.setting')}}" class="nav-link @if(Route::is('admin.site.setting') ) active @else '' @endif ">Site Settings  </a></li>
                </ul>
    
      </div><!-- sl-sideleft-menu -->

      <br>
    </div>