@extends('admin.layouts.index')
@section('title', 'Page')
@section('title_link', route('page.index'))
@section('action', 'Add')
@section('content')
    @include('admin.breadcrumb')

    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::open(['route' => 'menu.store', 'method' => 'POST', 'files' => true]) !!}
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col">
                            {!! Form::label('menu', 'Menu[en]') !!}<span class="text-danger">*</span>
                            {!! Form::text('menu[en]', null, [
                                'class' => 'form-control',
                                'id' => 'menu',
                                'placeholder' => 'Enter menu in english',
                            ]) !!}
                            @error('menu')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            {!! Form::label('menu', 'Menu[ne]') !!}<span class="text-danger">*</span>
                            {!! Form::text('menu[ne]', null, [
                                'class' => 'form-control',
                                'id' => 'menu',
                                'placeholder' => 'Enter menu in nepali',
                            ]) !!}
                            @error('menu')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col">
                            {!! Form::label('menu', 'Menu Type') !!}<span class="text-danger">*</span>
                            {!! Form::select('menu_type', ['1' => 'Page', '2' => 'Modal', '3' => 'Link'], null, [
                                'class' => 'form-control, form-select',
                                'id' => 'menu_type_select',
                                'placeholder' => 'Select menu',
                            ]) !!}
                            @error('menu')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-4" style="display:none" id="page_section">
                            {!! Form::label('page', 'Page') !!}
                            {!! Form::select('page_id', $titles, null, [
                                'class' => 'form-control mb-3 form-select',
                                'placeholder' => 'Select Page',
                            ]) !!}
                            <span class="text-danger">
                                @error('page')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-4" style="display:none" id="modal_section">
                            {!! Form::label('modal', 'Modal') !!}
                            {!! Form::select('modal_id', $modals, null, [
                                'class' => 'form-control form-select mb-3',
                                'placeholder' => 'Enter modal',
                            ]) !!}
                            @error('modal')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4" style="display:none" id="link_section">
                            {!! Form::label('link', 'Link') !!}
                            {!! Form::text('link', null, [
                                'class' => 'form-control mb-3',
                                'placeholder' => 'Enter link',
                            ]) !!}
                            @error('link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            {!! Form::label('parent', 'Parent') !!}
                            {!! Form::select('parent_id', $perentname,null, [
                                'class' => 'form-control form-select mb-3',
                                'placeholder' => 'Enter parent',
                            ]) !!}
                            @error('parent')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            {!! Form::label('display_order', 'Display Order') !!}<span class="text-danger">*</span>
                            {!! Form::text('display_order', null, [
                                'class' => 'form-control mb-3',
                                'id' => 'display_order',
                                'placeholder' => 'Enter order to display',
                            ]) !!}
                            @error('display_order')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    <div class="col-4">
                        {!! Form::label('status', 'Status  ') !!}<span class="text-danger">*</span>
                        <div class="ml-3">
                            {!! Form::radio('status', '1', true, ['class' => 'form-check-input form-check-input-sm mr-1']) !!} Active
                        </div>
                        <div class="ml-3">
                            {!! Form::radio('status', '0', false, ['class' => 'form-check-input form-check-input-sm mr-1']) !!} Inactive
                        </div>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                    <div class="d-flex justify-content-between mt-5 mb-3">
                        <a href="{{ route('schedule.index') }}" class="btn btn-danger">Cancel</a>
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
