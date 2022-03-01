<section class="sign-in-page">
    <div id="container-inside">
        <div id="circle-small"></div>
        <div id="circle-medium"></div>
        <div id="circle-large"></div>
        <div id="circle-xlarge"></div>
        <div id="circle-xxlarge"></div>
    </div>
    <div class="container p-0 align-middle">
        <div class="row">
            <div class="col-md-6 text-center pt-0">
                @include('livewire.auth.panel-slider')
            </div>
            <div class="col-md-6 bg-white p-3">
                <div class="sign-in-from p-4" style="border: 1px solid #a5a5a5;">
                    <h1 class="mb-0 font-rajdhani weight-600">Iniciar sesión</h1>
                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ $tab == 1 ? 'active' : ''}}" id="home-tab" data-toggle="tab"
                               href="#home" role="tab" wire:click.prevent="updateTab(1)"
                               aria-controls="home" aria-selected="true">Estudiante
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ $tab == 2 ? 'active' : ''}}" id="profile-tab" data-toggle="tab"
                               href="#profile" role="tab" wire:click.prevent="updateTab(2)"
                               aria-controls="profile" aria-selected="false">Administrador
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content pb-3" id="myTabContent" ondragstart="return false"
                         onselectstart="return false" oncontextmenu="return false">
                        <div class="tab-pane fade {{ $tab == 1 ? 'show active' : ''}}" id="home" role="tabpanel"
                             aria-labelledby="home-tab">
                            <p>Inicie sesión con tu Cuenta Institucional de CEPREUNA.</p>
                            <div class="text-center mt-5">
                                {{--                                <a href="{{ route('auth.google') }}" class="btn btn-google mb-5">--}}
                                {{--                                    <i class="ri-google-fill"></i>Inicar sesion con Google--}}
                                {{--                                </a>--}}

                                <a href="{{ route('auth.google') }}"
                                   class="btn btn-icon-google align-middle icon-google btn-block text-center">
                                        <span>
                                            <img src="{{ asset('assets/images/icon/google.svg') }}"
                                                 class="img-fluid" width="18">
                                        </span>
                                    <span class="align-middle">Inicar sesion con Google</span>
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ $tab == 2 ? 'show active' : ''}}" id="profile" role="tabpanel"
                             aria-labelledby="profile-tab">
                            <p>Ingrese su dirección de correo electrónico y contraseña para acceder.</p>
                            <form class="mt-4">
                                @csrf
                                @guest
                                    <div class="form-group">
                                        <label for="email" class="font-rajdhani-18 weight-500"
                                               style="color: #696969; text-transform: uppercase;">Dirección
                                            de correo electrónico</label>
                                        <input type="email"
                                               class="form-control mb-0  @error('email') is-invalid @enderror"
                                               id="email" placeholder="Correo electrónico" wire:model="email">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {!! $message !!}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="font-rajdhani-18 weight-500"
                                               style="color:  #696969; text-transform: uppercase;">Contraseña</label>
                                        <a href="#" class="float-right roboto">¿Se te olvidó tu contraseña?</a>
                                        <div class="input-group">
                                            <input type="password"
                                                   class="form-control mb-0 @error('password') border-invalid @enderror"
                                                   id="password" wire:model="password" placeholder="Contraseña">
                                            <button id="toggle-password" type="button" class="d-none"
                                                    aria-label="Show password as plain text. Warning: this will display your password on the screen.">
                                            </button>
                                        </div>
                                        @error('password')
                                        <div class="text-danger"
                                             style="margin-top: .25rem; font-size: .75rem; color: #f0643b !important;">
                                            {!! $message !!}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="d-inline-block w-100">
                                        {{--                                <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">--}}
                                        {{--                                    <input type="checkbox" class="custom-control-input" id="customCheck1">--}}
                                        {{--                                    <label class="custom-control-label" for="customCheck1">Remember Me</label>--}}
                                        {{--                                </div>--}}
                                        <button type="submit" class="btn btn-primary float-right"
                                                wire:click.prevent="login">
                                            <i class="ri-login-box-line"></i>Iniciar sesión
                                        </button>

                                    </div>

                                    <div class="sign-info mb-3">
                                <span class="dark-color d-inline-block line-height-2">¿No tienes una cuenta? <a
                                        href="{{ route('register') }}" class="roboto">Registrarme</a></span>
                                        <ul class="iq-social-media">
                                            <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                            <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                            <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                        </ul>
                                    </div>
                                @else
                                    <div class="alert alert-success rounded-0">
                                        Ya ha iniciado sesión en la aplicación.
                                    </div>
                                @endguest


                            </form>
                        </div>
                    </div>

                    @if (session()->has('error'))
                        <p class="note mb-3 mt-3 font-rajdhani-16 note-danger">
                            <strong>Aviso: </strong>{{ session('error') }}
                        </p>
                    @endif

                </div>

            </div>
        </div>
    </div>
</section>
@push('title') {{ $_title }} @endpush

@push('styles')
    <style>
        button#toggle-password {
            position: absolute;
            top: 3px;
            right: 4px;
            z-index: 9;
            width: 28px;
            height: 30px;
            background: 0;
            border: 0;
        }

        button#toggle-password:active,
        button#toggle-password:focus,
        button#toggle-password:hover {
            cursor: pointer;
        }

        button#toggle-password:focus {
            outline: none !important;
        }

        .input-password {
            padding-right: calc(1.5em + 0.75rem);
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        .input-password[type=password]:valid {
            background-image: url("data:image/svg+xml,%3Csvg width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z'/%3E%3Cpath d='M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299l.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z'/%3E%3Cpath d='M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709z'/%3E%3Cpath fill-rule='evenodd' d='M13.646 14.354l-12-12 .708-.708 12 12-.708.708z'/%3E%3C/svg%3E") !important;
        }

        .input-password[type=text]:valid {
            background-image: url("data:image/svg+xml,%3Csvg width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z'/%3E%3Cpath fill-rule='evenodd' d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/%3E%3C/svg%3E") !important;
        }
    </style>
    <style>
        .icon-google {
            font-size: calc(14px + (13 - 12) * ((100vw - 360px) / (1600 - 320))) !important;;
            padding: calc(7px + 5 * ((100vw - 320px) / 780)) !important;
            color: #707070 !important
        }

        .icon-google:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }

        .btn-icon-google {
            border: 1px solid #a5a5a5;
            background-color: transparent;
            border-radius: 0;
            letter-spacing: 1px
        }

        .btn-icon-google:hover {
            background-color: #3c79e6;
            color: #fff !important;
            border: 1px solid #3c79e6;
        }
    </style>
@endpush
@push('scripts')
    <script type="text/javascript">
        var ShowPasswordToggle = document.querySelector("[type='password']");
        ShowPasswordToggle.onclick = function () {
            document.querySelector("[type='password']").classList.add("input-password");
            document.getElementById("toggle-password").classList.remove("d-none");

            const passwordInput = document.querySelector("[type='password']");
            const togglePasswordButton = document.getElementById("toggle-password");

            togglePasswordButton.addEventListener("click", togglePassword);

            function togglePassword() {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    togglePasswordButton.setAttribute("aria-label", "Hide password.");
                } else {
                    passwordInput.type = "password";
                    togglePasswordButton.setAttribute(
                        "aria-label",
                        "Show password as plain text. " +
                        "Warning: this will display your password on the screen."
                    );
                }
            }
        };


    </script>
@endpush


