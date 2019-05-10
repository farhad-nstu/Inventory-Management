@extends('layouts.app')

@section('content')

<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <!-- Start Widget -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Attendence of {{ $singleAttendence->attendence_date }} 
                                            <big class="text-success pull-right">Today {{ date('d/m/Y') }},{{ date('D') }}</big></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                            <form action="{{ url('/update-attendence') }}" method="post">
                                                @csrf
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Photo</th>
                                                            <th>Attendence</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            @foreach($editAttendence as $item)
                                                            <tr>
                                                                <td>{{ $item->name }}</td>
                                                                <td><img src="{{ URL::to($item->photo) }}" style="height: 60px;width: 60px;"></td>
                                                                <input type="hidden" name="id[]" value="{{ $item->id }}">
                                                                <td>
                                                                    <input type="radio" name="attendence[{{ $item->id }}]" value="Present" required="" @php if($item->attendence == 'Present') {echo "checked";} @endphp> Present   
                                                                    <input type="radio" name="attendence[{{ $item->id }}]" value="Absent" @php if($item->attendence == 'Absent') {echo "checked";} @endphp> Absent   
                                                                </td>
                                                                <input type="hidden" name="attendence_date" value="{{ date("d/m/Y") }}">
                                                                <input type="hidden" name="attendence_year" value="{{ date("Y") }}">
                                                                <input type="hidden" name="edit_date" value="{{ date("d_m_Y") }}">
                                                            </tr>
                                                            @endforeach
                                                    </tbody>
                                                </table>
                                                <button type="submit" class="btn btn-success center-block">Update Attendance</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- End row-->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

@endsection