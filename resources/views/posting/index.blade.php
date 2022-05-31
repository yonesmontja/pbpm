@extends('layouts.master5')
@section('title')
    <title> SD Dabolding POSTING </title>
@endsection
@section('content')
    <div class="content-wrapper">
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <div class="card">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="card-header">
                        <form class="row row-cols-lg-auto g-1">
                            <div class="col">
                                <input class="form-control" type="text" name="q" value="{{ $q }}"
                                    placeholder="Search here..." />
                            </div>
                            <div class="col">
                                <button class="btn btn-success">Refresh</button>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ route('posting.create') }}">Add</a>
                            </div>
                            <div class="col-sm-2">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                                    <li class="breadcrumb-item active">POSTING</li>
                                </ol>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-bordered table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($postings as $key => $posting)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $posting->title }}</td>
                                    <td>
                                        <img src="{{ $posting->image() }}" height="75" />
                                    </td>
                                    <td class="text-nowrap">
                                        <a class="btn btn-sm btn-info"
                                            href="{{ route('posting.show', $posting) }}">Show</a>
                                        <a class="btn btn-sm btn-warning"
                                            href="{{ route('posting.edit', $posting) }}">Edit</a>
                                        <form method="posting" action="{{ route('posting.destroy', $posting) }}"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Hapus Data?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
