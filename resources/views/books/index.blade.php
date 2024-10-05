@extends('components.layout')

@section('content')
<div class="container">
    <x-flash-message />

    <div class="table-responsive table-striped table-dark table-hover mx-auto">
        <table class="table table-striped table-dark table-hover mx-auto">
            <caption>{{ __("List of Book Listings") }}</caption>
            <thead>
                <tr>
                    <th scope="col">{{ __("Book's Title") }}</th>
                    <th scope="col">{{ __("Book's Page Count") }}</th>
                    <th scope="col">{{ __("Book's ISBN Code") }}</th>
                    <th scope="col">{{ __("Book's Short Description") }}</th>
                    <th scope="col">{{ __("Book's Author") }}</th>
                    <th scope="col">{{ __("Action") }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form class="form-inline" action="{{ route('books.search') }}" method="POST">
                        @csrf
                        <div class="input-fields form-group col-md-5">
                            <label for="author_id" class="sr-only">{{ __("Author") }}</label>
                            <select class="form-control" id="author_id" name="author_id">
                                <option value="all" {{ $filterBook->author_id == 'all' ? 'selected' : '' }}>{{ __("All Authors") }}</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->author->id }}" {{ $filterBook->author_id == $book->author->id ? 'selected' : '' }}>
                                        {{ $book->author->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __("Filter Author") }}</button>
                    </form>
                </tr>
                @unless ($books->isEmpty())
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->pages }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>{{ $book->short_desc }}</td>
                            <td>
                                @if ($book->author)
                                    {{ $book->author->name }} {{ $book->author->surname }}
                                @endif
                            </td>
                            <td>
                                <div class="d-inline-block">
                                    <a href="books/{{ $book->id }}/edit"><i class="text-warning  fa-lg fa-solid fa-pen-to-square me-2 edit"></i></a>
                                    <form method="POST" action="{{ route('books.destroy', [$book->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="text-danger fa-lg fa-solid  deleteBookIcon fa-trash delete"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center">
                        <td class="px-4 py-8 border-top border-bottom border-gray text-lg" colspan="5">
                            <p class="mb-0">{{ __("Empty table!") }}</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </div>
</div>
@endsection
