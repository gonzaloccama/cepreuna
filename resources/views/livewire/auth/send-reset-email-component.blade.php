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
                    <h1 class="mb-0">Enviar mensaje</h1>
                    <p>Ingrese su dirección de correo electrónico para resetar su contraseña.</p>
                    <form class="mt-4" wire:submit.prevent="send_reset_email">
                        @guest
                            <div class="form-group">
                                <label for="email" style="font-weight: 500; color: #696969; text-transform: uppercase;">Dirección
                                    de correo electrónico</label>
                                <input type="email" class="form-control mb-0  @error('email') is-invalid @enderror"
                                       id="email" placeholder="Correo electrónico" wire:model="email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {!! $message !!}
                                </div>
                                @enderror
                            </div>
                        @else
                            <div class="form-group">
                                <label for="email" style="font-weight: 500; color: #696969; text-transform: uppercase;">Dirección
                                    de correo electrónico</label>
                                <input type="email" class="form-control mb-0  @error('email') is-invalid @enderror"
                                       id="email" placeholder="Correo electrónico" wire:model="email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {!! $message !!}
                                </div>
                                @enderror
                            </div>

                            <div class="alert alert-success text-center rounded-0">
                                Ya ha iniciado sesión en la aplicación.
                            </div>
                        @endguest
                            <button type="submit" class="btn btn-primary float-right">Enviar</button>
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
