@props(['title', 'subtitle', 'route'])

<div class="card bg-breadcrumb shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">{{ $subtitle }}</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none"
                                href="{{ $route }}">{{ $title }}</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">{{ $subtitle }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
