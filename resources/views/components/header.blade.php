<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 shadow rounded mb-3">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ route('sales.history') }}">Shop</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link fw-medium" aria-current="page"
                                        href="{{ route('sales.history') }}">Home<a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-medium" aria-current="page"
                                        href="{{ route('all.products') }}">All Produts<a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-medium" aria-current="page"
                                        href="{{ route('products.create') }}">Add Produts<a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-medium" aria-current="page"
                                        href="{{ route('products.sell.create') }}">Sell Produts<a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
