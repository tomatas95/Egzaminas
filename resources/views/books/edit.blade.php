@extends('components.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        {{ __("Edit") }} {{ $book->title}} by {{ $book->author->name . ' ' . $book->author->name }} {{ __("Information") }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('books.update', $book->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="title">{{ __("Book's Title") }}</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="{{ __("Enter Book's Title") }}." value="{{$book->title }}">
                                    <hr class="input-hover-effect">

                                    @error('title')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="pages">{{ __("Book's Page Amount") }}</label>
                                    <input type="number" min="1" max="99999" class="form-control @error('pages')is-invalid @enderror" id="pages" name="pages" placeholder="{{ __("Enter Book Page Count") }}" value="{{$book->pages }}">
                                    <hr class="input-hover-effect">

                                    @error('pages')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="isbn">{{ __("Enter Book's ISBN Code") }}</label>
                                <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" placeholder="{{ __("Enter Book's ISBN Code") }}." value="{{$book->isbn }}">
                                <hr class="input-hover-effect">

                                @error('isbn')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_desc">{{ __("Book's Short Description") }}</label>
                                <input type="text" class="form-control @error('short_desc') is-invalid @enderror" id="short_desc" name="short_desc" placeholder="{{ __("Enter Book's Description") }}." value="{{$book->short_desc }}">
                                <hr class="input-hover-effect">

                                @error('short_desc')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="author_id">{{ __("Book's Author") }}</label>
                                <select name="author_id" class="form-control @error('author_id') border-error @enderror" id="author_id">
                                    <option value="" disabled {{ old('author_id') == '' ? 'selected' : '' }}>{{ __("Select Book's Author") }}</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                <hr class="input-hover-effect">
                                @error('author_id')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                @enderror
                            </div>                            
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <p>{{ __("You must fix these errors before proceeding") }}:</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                            <button type="submit" class="btn btn-primary">{{ __("Add a new Book Listing!") }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
