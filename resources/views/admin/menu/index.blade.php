@extends('admin.layouts.index')
@section('title', 'Page')
    @section('add_button', route('menu.create'))
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
                                <th scope="col">Menu</th>
                                <th scope="col">Menu Type</th>
                                <th scope="col">Page ID</th>
                                <th scope="col">Modal ID</th>
                                <th scope="col">Display Order</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $menu->menu['en'] }}</td>
                                    <td>{{ $menu->menu_type }}</td>
                                    <td>{{ $menu->page_id }}</td>
                                    <td>{{ $menu->modal_id }}</td>
                                    <td>{{ $menu->display_order }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-sm btn-outline-primary mr-1" data-toggle="tooltip" data-placement="top" title="Edit Menu">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger mr-1" onclick="return confirm('Are you sure you want to delete this menu?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
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
