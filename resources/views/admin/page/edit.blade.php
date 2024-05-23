@extends('admin.layouts.index')
@section('title', 'Page')
@section('title_link', route('page.index'))
@section('action', 'Edit')
@section('content')
    @include('admin.breadcrumb')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::open(['route' => 'page.store', 'method' => 'POST', 'files' => true]) !!}
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col">
                            {!! Form::label('title[en]', 'Title(eng)') !!}<span class="text-danger">*</span>
                            {!! Form::text('title[en]', $page->title['en'], [
                                'class' => 'form-control',
                                'id' => 'title',
                                'placeholder' => 'Enter title',
                            ]) !!}
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            {!! Form::label('title', 'Title(nep)') !!}<span class="text-danger">*</span>
                            {!! Form::text('title[]', $page->title['ne'], [
                                'class' => 'form-control',
                                'id' => 'title',
                                'placeholder' => 'Enter title',
                            ]) !!}
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-6">
                            {!! Form::label('image', 'Image') !!}<span class="text-danger">*</span>
                            {!! Form::file('image', [
                                'class' => 'form-control',
                                'id' => 'image',
                            ]) !!}
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                            {!! Form::label('content', 'Content(eng)') !!}<span class="text-danger">*</span>
                            {!! Form::textarea('content[]', $page->content['en'], [
                                'class' => 'form-control',
                                'id' => 'content',
                                'placeholder' => 'Enter content',
                            ]) !!}
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {!! Form::hidden('slug', null, ['id' => 'slug']) !!}

                        <div class="col">
                            {!! Form::label('content', 'Content(nep)') !!}<span class="text-danger">*</span>
                            {!! Form::textarea('content[]', $page->title['ne'], [
                                'class' => 'form-control',
                                'id' => 'content',
                                'placeholder' => 'Enter content',
                            ]) !!}
                            @error('content')
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
