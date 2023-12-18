@extends('Admin.layouts.base')
@section('title', 'Create movie')
@section('content')
{{--  <div class="row">
    <div class="col-md-12">

      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            <li>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </li>
        </ul>
      </div>
      @endif

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create Movie</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.movie.store') }}">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="e.g Guardian of The Galaxy" value="{{ old('title') }}">
            </div>
            <div class="form-group">
              <label for="trailer">Trailer</label>
              <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Video url" value="{{ old('trailer') }}">
            </div>
            <div class="form-group">
              <label for="trailer">Movie</label>
              <input type="text" class="form-control" id="trailer" name="movie" placeholder="Video url" value="{{ old('movie') }}">
            </div>
            <div class="form-group">
              <label for="duration">Duration</label>
              <input type="text" class="form-control" id="duration" name="duration" placeholder="1h 39m" value="{{ old('duration') }}">
            </div>
            <div class="form-group">
              <label>Date:</label>
              <div class="input-group date" id="release-date" data-target-input="nearest">
                <input type="date" name="release_date" class="form-control datetimepicker-input" data-target="#release-date" value="{{ old('release_date') }}">
                <div class="input-group-append" data-target="#release-date" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="short-about">Casts</label>
              <input type="text" class="form-control" id="short-about" name="cast" placeholder="Jackie Chan" value="{{ old('casts') }}">
            </div>
            <div class="form-group">
              <label for="short-about">Categories</label>
              <input type="text" class="form-control" id="short-about" name="category" placeholder="Action, Fantasy" value="{{ old('categories') }}">
            </div>
            <div class="form-group">
              <label for="small-thumbnail">Small Thumbnail</label>
              <input type="file" class="form-control" name="small_thumbnail" value="{{ old('small_thumbnail') }}">
            </div>
            <div class="form-group">
              <label for="large-thumbnail">Large Thumbnail</label>
              <input type="file" class="form-control" name="large_thumbnail" value="{{ old('large_thumbnail') }}">
            </div>
            <div class="form-group">
              <label for="short-about">Short About</label>
              <input type="text" class="form-control" id="short-about" name="short_about" placeholder="Awesome Movie" value="{{ old('short_about') }}">
            </div>
            <div class="form-group">
              <label for="short-about">About</label>
              <input type="text" class="form-control" id="about" name="about" placeholder="Awesome Movie" value="{{ old('about') }}">
            </div>
            <div class="form-group">
              <label>Featured</label>
              <select class="custom-select" name="featured">
                <option value="0" {{ old('featured') === '0' ? "Selected" : "" }}>No</option>
                <option value="1" {{ old('featured') === '1' ? "Selected" : "" }}>Yes</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>  --}}
<div class="row">
    <div class="col-md-12">

      {{--Alert Here --}}
        <div class="alert alert-danger">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endif
      </div>

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create Movie</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.movie.store') }}">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="e.g Guardian of The Galaxy" value="{{ old('title') }}">
            </div>
            <div class="form-group">
              <label for="trailer">Trailer</label>
              <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Video url" value="{{ old('trailer') }}">
            </div>
            <div class="form-group">
                <label for="trailer">Movie</label>
                <input type="text" class="form-control" id="movie" name="movie" placeholder="Video url" value="{{ old('movie') }}">
              </div>
            <div class="form-group">
              <label for="duration">Duration</label>
              <input type="text" class="form-control" id="duration" name="duration" placeholder="1h 39m" value="{{ old('duration') }}">
            </div>
            <div class="form-group">
              <label>Date:</label>
              <div class="input-group date" id="release-date" data-target-input="nearest">
                <input type="text" name="release_date" class="form-control datetimepicker-input" data-target="#release-date" value="{{ old('release_date') }}">
                <div class="input-group-append" data-target="#release-date" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="short-about">Casts</label>
              <input type="text" class="form-control" id="short-about" name="cast" placeholder="Jackie Chan">
            </div>
            <div class="form-group">
              <label for="short-about">Categories</label>
              <input type="text" class="form-control" id="short-about" name="category" placeholder="Action, Fantasy">
            </div>
            <div class="form-group">
              <label for="small-thumbnail">Small Thumbnail</label>
              <input type="file" class="form-control" name="small_thumbnail">
            </div>
            <div class="form-group">
              <label for="large-thumbnail">Large Thumbnail</label>
              <input type="file" class="form-control" name="large_thumbnail">
            </div>
            <div class="form-group">
              <label for="short-about">About</label>
              <input type="text" class="form-control" id="about" name="about" placeholder="Awesome Movie" value="{{ old('about') }}">
            </div>
            <div class="form-group">
              <label>Featured</label>
              <select class="custom-select" name="featured">
                <option value="0" {{ old('featured') === '0' }}>No</option>
                <option value="1" {{ old('featured') === '1' }}>Yes</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script>
        $('#release-date').datetimepicker({
            format: 'YYYY-MM-DD'
        })
    </script>
@endsection


