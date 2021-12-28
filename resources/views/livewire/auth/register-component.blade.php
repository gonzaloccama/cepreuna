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
                                       id="user_firstname" wire:model="user_firstname" placeholder="Nombres" {{ $readonly?'readonly':'' }}>
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
                                       id="user_lastname" wire:model="user_lastname" placeholder="Apellidos" {{ $readonly?'readonly':'' }}>
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
                                        href="#">Iniciar sesión</a></span>
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
