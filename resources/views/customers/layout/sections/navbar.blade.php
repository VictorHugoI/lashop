<nav>
    <div class="container">
        <div class="nav-inner">
            <a class="logo-small" title="Magento Commerce" href="index.html"><img alt="Magento Commerce" src="{{ asset('assets/images/logo-small.png') }}"></a>
            <ul id="nav" class="hidden-xs">
                @include('customers.sections.components.menu', ['categories' => $categoriesMenu])
            </ul>
        </div>
    </div>
</nav>

