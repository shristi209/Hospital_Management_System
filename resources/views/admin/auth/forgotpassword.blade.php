@include('admin.layouts.partials.head')

<body>
    <div class="form">
        <div class="form-container">
            <div class="text-center mb-4">
                <i class="fas fa-hospital" style="color:#007bff"> CareSync</i>
                <br><br><p>Please enter your email to reset your password!</p>
            </div>

            {!! Form::open(['route' => 'storepassword']) !!}
                @if (session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif
                <div class="form-group">
                    {!! Form::label('email', 'Email address', ['class' => 'form-label']) !!}<span class="text-danger">*</span>
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder'=>'Enter your email address']) !!}
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group d-flex justify-content-end">
                    {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</body>
@include('admin.layouts.partials.footer')
