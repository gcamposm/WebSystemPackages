<nav>
    <div class="nav nav-tabs profile-nav" id="nav-tab" role="tablist">
        <a 
        class="nav-item nav-link active"
        id="product-tab"
        data-toggle="tab"
        href="#product" 
        role="tab" 
        aria-controls="product" 
        aria-selected="true"
        >
            Por Productos
        </a>
        <a 
        class="nav-item nav-link"
        id="sell-tab" 
        data-toggle="tab" 
        href="#sell" 
        role="tab" 
        aria-controls="sell" 
        aria-selected="false"
        >
            Por Venta
        </a>
    </div>
</nav>

<div class="card-body" style="color: white;">
    <div class="tab-content" id="nav-tabContent">
        <div 
        class="tab-pane fade show active"
        id="product"
        role="tabpanel" 
        aria-labelledby="product-tab"
        >
            @include('modules.others.profile.product')
        </div>
        <div 
        class="tab-pane fade"
        id="sell" 
        role="tabpanel" 
        aria-labelledby="sell-tab"
        >
            @include('modules.others.profile.sell')
        </div>
    </div>
</div>
