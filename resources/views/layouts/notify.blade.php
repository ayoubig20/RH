<div class="col">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="success-alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('Update'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="success-alert">
            <strong>{{ session()->get('Update') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
     @if (session()->has('Status_Update'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="success-alert">
            <strong>{{ session()->get('Status_Update') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
     @if (session()->has('statusUpdate'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="success-alert">
            <strong>{{ session()->get('statusUpdate') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert" id="success-alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="success-alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert" id="success-alert">
            <strong>{{ session()->get('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <script>
        setTimeout(function() {
            $('#success-alert').alert('close');
        }, 2000);
    </script>
