@extends('components.layout')

@section('content')
<div class="container">
    <x-flash-message />

    <div class="table-responsive table-striped table-dark table-hover mx-auto">
        <table class="table table-striped table-dark table-hover mx-auto">
            <caption>{{ __("List of Authors") }}</caption>
            <thead>
                <tr>
                    <th scope="col">{{ __("Author's Name") }}</th>
                    <th scope="col">{{ __("Author's Surname") }}</th>
                    <th scope="col">{{ __("Action") }}</th>
                </tr>
            </thead>
            <tbody>
               
                @unless ($authors->isEmpty())
                @foreach ($authors as $author)
                <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->surname }}</td>
                        <td>
                            <div class="d-inline-block">
                                <a href="authors/{{ $author->id }}/edit"><i class="text-warning fa-lg fa-solid fa-pen-to-square me-2 edit"></i></a>
                                <form method="POST" action="{{ route('authors.destroy', [$author->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="text-danger fa-lg fa-solid fa-trash delete"></i></button>
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
