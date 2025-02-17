@extends('layouts.app')

@section('title', 'Grading Page')

@section('contentA')
    {{-- <div class="container"> --}}
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Class list </h2>
                <h3>Sem - School Year: 1 - 2024-2025 </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong> {{ $schedule_code }}</strong>
                    </li>
                </ol>
            </div>
        </div>
    {{-- </div> --}}
@endsection

@section('contentB')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Gradesheet for {{ $schedule_code }}</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>

                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th style="text-align: center;">#</th> <!-- Row Number Column -->
                            <th style="text-align: center;">STUDENT NAME</th>
                            <th style="text-align: center;">PRELIM</th>
                            <th style="text-align: center;">MIDTERM</th>
                            <th style="text-align: center;">FINAL</th>
                            <th style="text-align: center;">AVERAGE</th>
                            <th style="text-align: center;">GRADE</th>
                            <th style="text-align: center;">REMARKS</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $index => $student)
                            <tr class="gradeX">
                                <td style="text-align: center;">{{ $index + 1 }}</td> <!-- Row Number -->
                                <td>{{ strtoupper($student->last_name) }}, {{ strtoupper($student->first_name) }}</td>
                                <td style="text-align: center; padding: 10px;">
                                    <input type="text" name="prelim[{{ $student->student_number }}]" class="form-control text-center w-50" style="width: 50%; margin: 0 auto;">
                                </td>
                                <td style="text-align: center; padding: 10px;">
                                    <input type="text" name="midterm[{{ $student->student_number }}]" class="form-control text-center w-50" style="width: 50%; margin: 0 auto;">
                                </td>
                                <td style="text-align: center; padding: 10px;">
                                    <input type="text" name="final[{{ $student->student_number }}]" class="form-control text-center w-50" style="width: 50%; margin: 0 auto;">
                                </td>
                                <td style="text-align: center;">—</td>
                                <td style="text-align: center;">—</td>
                                <td style="text-align: center;">—</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>
    
   <!-- Page-Level Scripts -->
   <script>

    // Upgrade button class name
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'Gradesheet for {{ $schedule_code }}'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]

        });

    });

</script>
@endsection