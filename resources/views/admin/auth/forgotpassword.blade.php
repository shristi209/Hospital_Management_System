@include('admin.layouts.partials.head')
<body>
    <div class="form">
    <div class="form-container">
    <div class="text-center mb-4">
      <i class="fas fa-hospital" style="color:#007bff"> MediCare</i>
    </div>
    <form action="{{ route('storepassword') }}" method="POST">
        @if(session('fail'))
            <div class="alert alert-danger">
                {{ session('fail') }}
            </div>
        @endif
      @csrf
      <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="form2Example1">Email address</label>
        <input type="email" id="form2Example1" name="email" class="form-control" value="" />
        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
      </div>

      <span class="btn">
        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Send</button></div>
    </form>
    </span>
</div>
</body>
