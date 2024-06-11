@extends('admin.layouts.index')
@section('title', 'Page')
    @section('add_button', route('page.create'))
        @section('content')
            @include('admin.breadcrumb')

            <div class="card mt-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">S.N</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pages as $page)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $page->title['en'] }}</td>
                                            <td>{!! Str::limit($page->content['en'], 20) !!}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('page.edit', $page->id) }}"
                                                    class="btn btn-sm btn-outline-primary mr-1" data-toggle="tooltip"
                                                    data-placement="top" title="Edit Page">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <form action="{{ route('page.destroy', $page->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger mr-1"
                                                        onclick="return confirm('Are you sure you want to delete this user?')"
                                                        data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
