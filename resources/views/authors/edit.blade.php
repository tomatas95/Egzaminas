@extends('components.layout')

@section('content')
    <div class="box">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        {{ __("Edit") }} {{ $author->name, $author->surname }} {{ __("Information") }}
                    </div>
                    <div class="card-body">
                        <div class="form-container">
                        <form method="POST" action="{{ route('authors.update', $author->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="name">{{ __("Name") }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{__("Enter Author's Name..") }}" value="{{ $author->name }}">
                                    <hr class="input-hover-effect">

                                    @error('name')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="surname">{{ __("Surname") }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="surname" name="surname" placeholder="{{ __("Enter Author's Surname..") }}  "  value="{{$author->surname  }}">
                                    <hr class="input-hover-effect">

                                    @error('surname')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
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
                            <button type="submit" class="btn btn-primary">{{ __("Save Information") }} </button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
