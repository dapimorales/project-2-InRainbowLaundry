@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert" style="border-radius: 15px;">
        <div class="d-flex align-items-center">
            <span class="me-2">✅</span>
            <div>
                <strong>Mantap, Masbro!</strong> {{ session('success') }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0" role="alert" style="border-radius: 15px;">
        <div class="d-flex align-items-center">
            <span class="me-2">❌</span>
            <div>
                <strong>Waduh!</strong> {{ session('error') }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif