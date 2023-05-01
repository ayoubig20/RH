<div class="col">
    @if ($errors->any())
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2" id="success-alert">
            @foreach ($errors->all() as $error)
                {{-- <li>{{ $error }}</li> --}}
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Error</h6>
                        <div class="text-white">{{ $error }}
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        </div>
    @endif
    @if (session()->has('Add'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2" id="success-alert">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Success </h6>
                    <div class="text-white">{{ session()->get('Add') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif 
     @if (session()->has('success'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2" id="success-alert">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Success </h6>
                    <div class="text-white">{{ session()->get('success') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('Update'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2" id="success-alert">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Success </h6>
                    <div class="text-white">{{ session()->get('Update') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('Status_Update'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2" id="success-alert">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Success </h6>
                    <div class="text-white">{{ session()->get('Status_Update') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('statusUpdate'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2" id="success-alert">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Success </h6>
                    <div class="text-white">{{ session()->get('statusUpdate') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    @if (session()->has('delete'))
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2" id="success-alert">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Delete</h6>
                    <div class="text-white">{{ session()->get('delete') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('edit'))
        <div class="alert alert-info border-0 bg-info alert-dismissible fade show py-2" id="success-alert">
            <div class="d-flex align-items-center">
                <div class="font-35 text-dark"><i class='bx bx-info-square'></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-dark">update </h6>
                    <div class="text-dark">{{ session()->get('edit') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2" id="success-alert">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Error</h6>
                    <div class="text-white">{{ session()->get('error') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <script>
        setTimeout(function() {
            $('#success-alert').alert('close');
        }, 2000);
    </script>

    {{-- <div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-white"><i class='bx bx-bookmark-heart'></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">Primary Alerts</h6>
                <div class="text-white">A simple primary alert—check it out!</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="alert alert-secondary border-0 bg-secondary alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-white"><i class='bx bx-tag-alt'></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">Secondary Alerts</h6>
                <div class="text-white">A simple secondary alert—check it out!</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    
    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-dark">Warning Alerts</h6>
                <div class="text-dark">A simple Warning alert—check it out!</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
   
    <div class="alert alert-dark border-0 bg-dark alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-white"><i class='bx bx-bell'></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">Dark Alerts</h6>
                <div class="text-white">A simple dark alert—check it out!</div>
            </div>
        </div> --}}
