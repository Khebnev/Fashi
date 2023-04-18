@extends('admin.layouts.layout')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">New blog tag</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('blog-tags.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="Name">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
