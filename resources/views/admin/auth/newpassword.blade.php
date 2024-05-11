@include('admin.layouts.partials.head')
<style>.form-container {
    max-width: 400px;
    margin: 37px auto;
    background-color: white;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
}</style>
<body>
    <div class="form">
        <div class="form-container">
            <div class="text-center mb-4">
                <i class="fas fa-hospital" style="color:#007bff"> MediCare</i>
            </div>
            <div class="text-center mb-4">
                <h5> Reset Your Password</h5>
            </div>
            {!! Form::open(['route' => 'storeresetpassword', 'method'=>'POST']) !!}
                @if (session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif
                {{-- @csrf --}}
                <input type="text" name="token" hidden value="{{$token}}">
                {{-- @method('PUT') --}}
                <div class="form-group">
                    {!! Form::label('email', 'Email address', ['class' => 'form-label']) !!}<span class="text-danger">*</span>
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'New Password', ['class' => 'form-label']) !!}<span class="text-danger">*</span>
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Confirm New Password', ['class' => 'form-label']) !!}<span class="text-danger">*</span>
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mb-4">Reset</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
</body>

@include('admin.layouts.partials.footer')
