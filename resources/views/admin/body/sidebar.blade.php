<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class="fa-solid fa-gauge-high" style="font-size: 16px;"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fa-solid fa-handshake" style="font-size: 16px;"></i>
                </div>
                <div class="menu-title">Brand</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.brand') }}"><i class="fa-solid fa-arrow-right" style="font-size: 16px;"></i></i>All Brand</a>
                </li>
                <li> <a href="{{ route('add.brand') }}"><i class="fa-solid fa-arrow-right" style="font-size: 16px;"></i></i>Add Brand</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fa-solid fa-list" style="font-size: 16px;"></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.category') }}"><i class="fa-solid fa-arrow-right" style="font-size: 16px;"></i>All Category</a>
                </li>
                <li> <a href="{{ route('add.category') }}"><i class="fa-solid fa-arrow-right" style="font-size: 16px;"></i>Add Category</a>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fa-solid fa-list" style="font-size: 16px;"></i>
                </div>
                <div class="menu-title">Sub Category</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.subcategory') }}"><i class="fa-solid fa-arrow-right" style="font-size: 16px;"></i>All SubCategory</a>
                </li>
                <li> <a href="{{ route('add.subcategory') }}"><i class="fa-solid fa-arrow-right" style="font-size: 16px;"></i>Add SubCategory</a>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fa-solid fa-user-gear" style="font-size: 16px;"></i>
                </div>
                <div class="menu-title">Vendor Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('inactive.vendor') }}"><i class="fa-solid fa-arrow-right" style="font-size: 16px;"></i>Inactive Vendor</a>
                </li>
                <li> <a href="{{ route('active.vendor') }}"><i class="fa-solid fa-arrow-right" style="font-size: 16px;"></i>Active Vendor</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="fa-solid fa-store" style="font-size: 16px;"></i>
                </div>
                <div class="menu-title">Product Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.product') }}"><i class="fa-solid fa-arrow-right" style="font-size: 16px;"></i>All Product</a>
                </li>
                <li> <a href="{{ route('add.product') }}"><i class="fa-solid fa-arrow-right" style="font-size: 16px;"></i>Add Product</a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="fa-regular fa-images" style="font-size: 16px;"></i>
                </div>
                <div class="menu-title">Slider Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.slider') }}"><i class="fa-solid fa-arrow-right" style="font-size: 16px;"></i>All Slider</a>
                </li>
                <li> <a href="{{ route('add.slider') }}"><i class="fa-solid fa-arrow-right" style="font-size: 16px;"></i>Add Slider</a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Content</div>
            </a>
            <ul>
                <li> <a href="content-grid-system.html"><i class="fa-solid fa-arrow-right"></i></i>Grid System</a>
                </li>
                <li> <a href="content-typography.html"><i class="fa-solid fa-arrow-right"></i></i>Typography</a>
                </li>
                <li> <a href="content-text-utilities.html"><i class="fa-solid fa-arrow-right"></i></i>Text Utilities</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Icons</div>
            </a>
            <ul>
                <li> <a href="icons-line-icons.html"><i class="fa-solid fa-arrow-right"></i></i>Line Icons</a>
                </li>
                <li> <a href="icons-boxicons.html"><i class="fa-solid fa-arrow-right"></i></i>Boxicons</a>
                </li>
                <li> <a href="icons-feather-icons.html"><i class="fa-solid fa-arrow-right"></i></i>Feather Icons</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
