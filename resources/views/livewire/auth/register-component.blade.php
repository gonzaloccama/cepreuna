<section class="sign-in-page">
    <div id="container-inside">
        <div id="circle-small"></div>
        <div id="circle-medium"></div>
        <div id="circle-large"></div>
        <div id="circle-xlarge"></div>
        <div id="circle-xxlarge"></div>
    </div>
    <div class="container p-0">
        <div class="row no-gutters">
            <div class="col-md-6 text-center pt-0">
                @include('livewire.auth.panel-slider')
            </div>
            <div class="col-md-6 bg-white pt-5 wrapper">
                <div class="sign-in-from" style="height: 550px; overflow-y: auto;">
                    <h1 class="mb-0 font-rajdhani weight-600">Registrarse</h1>
                    <p>Ingrese su dirección de correo electrónico, contraseña y demás datos personales para acceder.</p>
                    <form class="mt-4" wire:submit.prevent="register">
                        @guest
                            <div class="form-group">
                                <label for="email" class="font-rajdhani-18 weight-500"
                                       style="color: #696969; text-transform: uppercase;">Correo electrónico</label>
                                <input type="email" class="form-control mb-0  @error('email') is-invalid @enderror"
                                       id="email" placeholder="Correo electrónico" wire:model="email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {!! $message !!}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="username" class="font-rajdhani-18 weight-500"
                                       style="color: #696969; text-transform: uppercase;">Usuario</label>
                                <input type="text" class="form-control mb-0  @error('username') is-invalid @enderror"
                                       id="username" placeholder="Nombre de Usuario" wire:model="username">
                                @error('username')
                                <div class="invalid-feedback">
                                    {!! $message !!}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone" class="font-rajdhani-18 weight-500"
                                       style="color: #696969; text-transform: uppercase;">Celular</label>
                                <input type="text" class="form-control mb-0  @error('phone') is-invalid @enderror"
                                       id="phone" placeholder="Número de celular" wire:model="phone">
                                @error('phone')
                                <div class="invalid-feedback">
                                    {!! $message !!}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="font-rajdhani-18 weight-500"
                                       style="color:  #696969; text-transform: uppercase;">Contraseña</label>
                                <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror"
                                       id="password" wire:model="password" placeholder="Contraseña">
                                @error('password')
                                <div class="invalid-feedback">
                                    {!! $message !!}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="confirm_password" class="font-rajdhani-18 weight-500"
                                       style="color:  #696969; text-transform: uppercase;">Confirmar contraseña</label>
                                <input type="password"
                                       class="form-control mb-0 @error('confirm_password') is-invalid @enderror"
                                       id="confirm_password" wire:model="confirm_password"
                                       placeholder="Confirmar contraseña">
                                @error('confirm_password')
                                <div class="invalid-feedback">
                                    {!! $message !!}
                                </div>
                                @enderror
                            </div>

                            <p class="note mb-3 font-rajdhani-16
                                @if ($errors->has('password')) note-danger @else note-success @endif">
                                <strong>Nota: </strong>Mínimo de 6 Caracteres,
                                Mayúsculas, Minúsculas, númericos y caracteres especiales:<strong> !$@#%_~</strong>
                            </p>

                            <div class="form-group">
                                <label for="user_dni" class="font-rajdhani-18 weight-500"
                                       style="color:  #696969; text-transform: uppercase;">DNI</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('user_dni') is-invalid @enderror"
                                           placeholder="DNI"
                                           aria-label="DNI" aria-describedby="button-addon2"
                                           id="user_dni" wire:model="user_dni">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" id="button-addon2"
                                                wire:click.prevent="searchData">
                                            Buscar...
                                        </button>
                                    </div>
                                </div>
                                @error('user_dni')
                                <div class="text-danger text-errors font-italic" style="font-size: 11px;">
                                    {!! $message !!}
                                </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="user_firstname" class="font-rajdhani-18 weight-500"
                                       style="color:  #696969; text-transform: uppercase;">Nombres</label>
                                <input type="text"
                                       class="form-control mb-0 @error('user_firstname') is-invalid @enderror"
                                       id="user_firstname" wire:model="user_firstname"
                                       placeholder="Nombres" {{ $readonly?'readonly':'' }}>
                                @error('user_firstname')
                                <div class="invalid-feedback">
                                    {!! $message !!}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="user_lastname" class="font-rajdhani-18 weight-500"
                                       style="color:  #696969; text-transform: uppercase;">Apellidos</label>
                                <input type="text"
                                       class="form-control mb-0 @error('user_lastname') is-invalid @enderror"
                                       id="user_lastname" wire:model="user_lastname"
                                       placeholder="Apellidos" {{ $readonly?'readonly':'' }}>
                                @error('user_lastname')
                                <div class="invalid-feedback">
                                    {!! $message !!}
                                </div>
                                @enderror
                            </div>

                            <div class="d-inline-block w-100">
                                <button type="submit" class="btn btn-primary float-right">Registrar</button>
                            </div>

                            <div class="sign-info">
                                <span class="dark-color d-inline-block line-height-2">¿Ya tienes una cuenta? <a
                                        class="roboto" href="{{ route('login') }}">Iniciar sesión</a></span>
                                <ul class="iq-social-media">
                                    <li><a href="javascript:;"><i class="ri-facebook-box-line"></i></a></li>
                                    <li><a href="javascript:;"><i class="ri-twitter-line"></i></a></li>
                                    <li><a href="javascript:;"><i class="ri-instagram-line"></i></a></li>
                                </ul>
                            </div>
                        @else
                            <div class="alert alert-success">
                                Ya ha iniciado sesión en la aplicación.
                            </div>
                        @endguest


                    </form>

                    @if (session()->has('error'))
                        <div class="alert alert-danger text-center w-100 mt-4 rounded-0">
                            {{ session('error') }}
                        </div>
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
