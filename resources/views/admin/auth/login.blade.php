@include('admin.layouts.partials.head')

<body>
    <div class="form">
        <div class="form-container">
            <div class="text-center mb-4">
                <i class="fas fa-hospital" style="color:#007bff"> CareSync</i>
            </div>
            <form action="{{ route('login-user') }}" method="POST">
                @if (session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif
                @csrf
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Email address<span class="text-danger">*</span></label>
                    <input type="email" id="form2Example1" name="email" class="form-control"
                        value="{{ old('email') }}" />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">Password<span class="text-danger">*</span></label>
                    <input type="password" id="form2Example2" name="password" class="form-control" />
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                    @error('g-recaptcha-response')
                        <span class="text-danger">This field is required</span>
                    @enderror
                </div>

                <span class="btn d-flex justify-content-between align-items-center">
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                        class="btn btn-primary mb-4">Login</button>
                    <a href="{{ route('forgotpassword') }}" data-mdb-button-init data-mdb-ripple-init>Forgot
                        Password</a>
        </div>

        </form>
        </span>
    </div>
</body>
