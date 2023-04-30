@extends('layouts.employee')
@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>
@endsection
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">

            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div id="invoice">
                        <div class="toolbar hidden-print">
                            <div class="text-end">
                                <button type="button" class="btn btn-danger" id="print_Button" onclick="printDoc()" >
                                    <i class="fa fa-file-pdf-o"></i> Export as PDF
                                </button>
                            </div>
                            <hr />
                        </div>
                        <div class="invoice overflow-auto" id="print">
                            <div style="min-width: 600px">
                                <header>
                                    <div class="row">
                                        <div class="col">
                                            <h1 class="name text-capitalize text-center">
                                                <a href="javascript:;">
                                                    <img src="{{ URL::asset('assets/images/logo-purple.png') }}"
                                                        width="90" alt="" />
                                                </a>
                                                EMS Employee Management System
                                            </h1>
                                            <div>Inzegane, Agadir, Morocco</div>
                                            <div>(123) 456-789</div>
                                            <div>ems@example.com</div>
                                        </div>
                                    </div>
                                </header>
                                <main>
                                    <div class="row contacts">
                                        <div class="col invoice-details">
                                            <h1 class="invoice-id text-center">Work Certificate</h1>
                                            <div class="date">Date of Document: {{ now()->format('Y-m-d') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col fs-5">
                                        <div class="text-gray-light">Certificate To:</div>
                                        <h2 class="to">{{ auth()->guard('employee')->user()->lastName }}
                                            {{ auth()->guard('employee')->user()->firstName }}</h2>
                                        <div class="address">{{ auth()->guard('employee')->user()->address }}</div>
                                        <div class="email"><a
                                                href="{{ auth()->guard('employee')->user()->email }}">{{ auth()->guard('employee')->user()->email }}</a>
                                        </div>
                                    </div>
                                    <div></br></div>
                                    <div class="col m-auto fs-3">
                                        <p>Dear {{ auth()->guard('employee')->user()->firstName }},</p>
                                        <p>This is to certify that you have been working as a
                                            {{ auth()->guard('employee')->user()->job->title }} at <strong>Employee
                                                Mangement company</strong> in
                                            {{ auth()->guard('employee')->user()->job->department->name }}
                                            department from {{ auth()->guard('employee')->user()->fatteningDate }}
                                            to @if (auth()->guard('employee')->user()->deleted_at)
                                                {{ auth()->guard('employee')->user()->deleted_at }}
                                            @else
                                                {{ now()->format('Y-m-d') }}
                                            @endif. During your tenure, you have performed your duties
                                            diligently and to the best of your abilities.</p>
                                        <p>We wish you all the best in your future endeavors.</p>
                                        <div class="text-end">
                                            <p>Sincerely,</p>
                                            <p>[Company Representative Name]</p>
                                        </div>
                                    </div>
                                    <section>
                                        <div class="thanks">Thank you!</div>
                                        <div class="notices">
                                            <div>NOTICE:</div>
                                            <div class="notice">This document was delivered as a right.</div>
                                        </div>
                                    </section>
                                </main>
                                <footer>Certificate was created on a computer and is valid without the signature and seal.
                                </footer>
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>


    <script type="text/javascript">
        function printDoc() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>

@endsection
