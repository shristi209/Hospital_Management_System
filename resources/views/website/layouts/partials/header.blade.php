<header class="site-header">
    <style>
        .form-check-input:checked {
            background-color: #5bc1ac;
            /* border-color:var(--secondary-color);
             */
            border-color: white;
        }
    </style>
    <div class="container">
        <div class="row">

            <div class="col-lg-7 col-12 d-flex flex-wrap">
                <p class="d-flex me-4 mb-0">
                    <i class="bi-geo-alt me-2"></i>
                    Kathmandu, Nepal
                </p>

                <p class="d-flex mb-0">
                    <i class="bi-envelope me-2"></i>

                    <a href="mailto:info@company.com">
                        info@care.com
                    </a>
                </p>
            </div>

            <div class="col-lg-2 col-12 d-flex flex-wrap">
                <p>en&nbsp; &nbsp;</p>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ session('locale')=='ne' ?'checked' : '' }} onclick="handleCheckbox()">
                    <p>ने</p>
                </div>
            </div>
            {{-- @dd(app()->getLocale()); --}}

            <div class="col-lg-2 col-12 ms-auto d-lg-block d-none">
                <ul class="social-icon">
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-twitter"></a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-facebook"></a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-instagram"></a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-youtube"></a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-whatsapp"></a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>
<script>
    function handleCheckbox()
    {
        var checkbox = document.getElementById('flexSwitchCheckChecked');
        var locale = checkbox.checked ? 'ne' : 'en';
        window.location.href = "/change/language/" + locale;

    }
</script>
