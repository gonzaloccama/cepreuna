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
            <div class="col-md-6 bg-white pt-5">
                <div class="sign-in-from">
                    <h1 class="mb-0 font-rajdhani weight-600">Iniciar sesión</h1>
                    <p>Ingrese su dirección de correo electrónico y contraseña para acceder.</p>
                    <form class="mt-4" wire:submit.prevent="login">
                        @guest
                            <div class="form-group">
                                <label for="email" class="font-rajdhani-18 weight-500" style="color: #696969; text-transform: uppercase;">Dirección
                                    de correo electrónico</label>
                                <input type="email" class="form-control mb-0  @error('email') is-invalid @enderror"
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
                                <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror"
                                       id="password" wire:model="password" placeholder="Contraseña">
                                @error('password')
                                <div class="invalid-feedback">
                                    {!! $message !!}
                                </div>
                                @enderror
                            </div>
                            <div class="d-inline-block w-100">
{{--                                <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck1">--}}
{{--                                    <label class="custom-control-label" for="customCheck1">Remember Me</label>--}}
{{--                                </div>--}}
                                <button type="submit" class="btn btn-primary float-right">Iniciar sesión</button>
                            </div>
                            <div class="sign-info">
                                <span class="dark-color d-inline-block line-height-2">¿No tienes una cuenta? <a
                                        href="#" class="roboto">Registrarme</a></span>
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


