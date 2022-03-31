@extends('layouts.calendar')

@section('title')
    <title> AdminLTE 3 | Kalender </title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kalender</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Kalender</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Aktivitas</h4>
                                </div>
                                <div class="card-body">
                                    <!-- the events -->
                                    <div id="external-events">
                                        <div class="external-event bg-success">Makan Siang</div>
                                        <div class="external-event bg-warning">English</div>
                                        <div class="external-event bg-info">Wawancara</div>
                                        <div class="external-event bg-primary">Tokoh Adat</div>
                                        <div class="external-event bg-danger">Ikan Asin</div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Buat Aktivitas</h3>
                                </div>
                                <div class="card-body">
                                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                        <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                                        <ul class="fc-color-picker" id="color-chooser">
                                            <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-body p-0">
                                <!-- THE CALENDAR -->
                                <div id="calendar"></div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="color" class="col-sm-4 col-form-label">Event Title</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="title">
                            <span id="titleError" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="color" class="col-sm-4 col-form-label">Event Color</label>
                        <div class="col-sm-8">
                            <input type="color" name="color" class="form-control" id="color">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
