@props([
    'header',
    'content',
    'route' => route('profiles.update', ['id' => $content->id])
])

<div class="row">
    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-stretch">
        <div class="card card-body">
            <h4 class="card-title">{{ $header }}</h4>
            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{ $slotForm }}
            </form>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-stretch">
        <div class="card card-body position-relative">
            {{ $slotResult }}
        </div>
    </div>
</div>
