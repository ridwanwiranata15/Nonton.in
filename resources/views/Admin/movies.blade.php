@extends('Admin.layouts.base')
@section('title', 'Movies')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Movies</h3>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('AdminMovieCreate') }}" class="btn btn-warning">Create Movie</a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <table id="movie" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Small Thumbnail</th>
                    <th>Large Thumbmail</th>
                    <th>Categories</th>
                    <th>Casts</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                    <tr>
                        <th>Id</th>
                        <th>{{ $movie->title }}</th>
                        <th><img src="{{ asset('storage/thumbnail/'.$movie->small_thumbnail)}}" alt="gambar" width="100px" height="100px"></th>
                        <th><img src="{{ asset('storage/thumbnail/'.$movie->large_thumbnail)}}" alt="gambar" width="100px"></th>
                        <th>{{ $movie->category }}</th>
                        <th>{{ $movie->cast }}</th>
                        {{--  <th>{{ $movie->movie }}</th>
                        <th>{{ $movie->release_date }}</th>
                        <th>{{ $movie->about }}</th>
                        <th>{{ $movie->duration }}</th>
                        <th>{{ $movie->featured }}</th>  --}}
                        <th>
                            <a href="{{ route('admin.movie.edit', $movie->id) }}" class="btn btn-secondary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.movie.destroy', $movie->id) }}" method="post">
                                @csrf
                                @method('delete')
                               <button class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                               </button>
                            </form>
                        </th>
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
  @section('js')
        <script>
            $('#movie').DataTable();
        </script>
  @endsection
