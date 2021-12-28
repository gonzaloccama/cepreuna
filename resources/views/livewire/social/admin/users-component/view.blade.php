<div class="row">
    <div class="col-lg-4 col-xl-4">
        <div class="card-box text-center">
            <?php
            if ($edit_user_cover || $edit_user_cover != '') {
                $_picture = $edit_user_cover;
            } else {
                $_picture = $user_gender == 2 ? 'woman.png' : 'man.png';
            }
            ?>
            <img src="{{ asset('assets'.'/'.$image_path).'/'.$_picture }}"
                 class="rounded-circle avatar-xxl img-thumbnail"
                 alt="{{ $user_firstname . ' ' .$user_lastname }}">

            <h4 class="mb-0">{{ $user_firstname . ' ' .$user_lastname }}</h4>
            <p class="text-muted">{{ '@'.$role }}</p>

                <a href="{{ route('social.profile', ['id' => base64_encode($itemId)]) }}">Ver perfil</a>

                <hr>
            <div class="text-left mt-3">
                <h4 class="font-13 text-uppercase">Bigrafía :</h4>
                <p class="text-muted font-13 mb-3">
                    {{ $user_biography }}
                </p>
                <hr>
                <p class="text-muted mb-2 font-13">
                    <strong>Usuario :</strong>
                    <span class="ml-2  text-right">{{ $username }}</span>
                </p>

                <p class="text-muted mb-2 font-13">
                    <strong>Email :</strong>
                    <span class="ml-2  text-right">{{ $email }}</span>
                </p>

                <p class="text-muted mb-2 font-13">
                    <strong>Celular :</strong>
                    <span class="ml-2 text-right">{{ $phone }}</span></p>

                <p class="text-muted mb-1 font-13">
                    <strong>Dirección :</strong>
                    <span class="ml-2 text-right">{{ $user_address }}</span>
                </p>
{{--                {{  Hash::check('plain-text', $findURL)  }}--}}
            </div>

            {{--            <ul class="social-list list-inline mt-3 mb-0">--}}
            {{--                <li class="list-inline-item">--}}
            {{--                    <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i--}}
            {{--                            class="mdi mdi-facebook"></i></a>--}}
            {{--                </li>                --}}
            {{--            </ul>--}}
        </div> <!-- end card-box -->

    </div> <!-- end col-->

    <div class="col-lg-8 col-xl-8">
        <div class="card-box">
            <div class="card-widgets">
                <a href="" wire:click.prevent="closeFrame"><i class="mdi mdi-close"></i></a>
            </div>

            <div class="pb-2 mt-3">
                <h5 class="h6 bg-light p-2 text-uppercase">Fecha de registro</h5>
                <p class="text-muted container font-13 mb-3">
                    {{ $this->dateSpanish($created_at, 'withtime') }}
                </p>
            </div>
            <div class="pb-2">
                <h5 class="h6 bg-light p-2 text-uppercase">Rol de usuario</h5>
                <p class="text-muted container font-13 mb-3">
                    {{ $role }}
                </p>
            </div>
            <div class="pb-2">
                <h5 class="h6 bg-light p-2 text-uppercase">Estado de usuario</h5>
                <p class="text-muted container font-13 mb-3">
                           <span class="rounded-0 badge {{ (int)$user_activated?'badge-success-1':'badge-danger-1' }}">
                                {{ (int)$user_activated?'Activo':'Inactivo' }}
                            </span>
                </p>
            </div>

            <div class="pb-2">
                <h5 class="h6 bg-light p-2 text-uppercase">Usuario Baneado</h5>
                <p class="text-muted container font-13 mb-3">
                           <span class="rounded-0 badge {{ !(int)$user_banned?'badge-success-1':'badge-danger-1' }}">
                                {{ !(int)$user_banned?'No baneado':'Baneado' }}
                            </span>
                </p>
            </div>

            <div class="col-md-12 text-right">
                <button type="reset" wire:click.prevent="closeFrame"
                        class="btn btn-primary waves-effect waves-light mr-1">
                    <b><i class="fe-corner-up-left"></i>&nbsp;&nbsp;Regresar</b>
                </button>
                <button type="reset" wire:click.prevent="deleteConfirm({{ $itemId }})"
                        class="btn btn-danger waves-effect waves-light mr-1">
                    <b><i class="fe-trash-2"></i>&nbsp;&nbsp;Eliminar</b>
                </button>
                <button type="submit" class="btn btn-success waves-effect waves-light mr-1"
                        wire:click.prevent="openEdit({{ $itemId }})">
                    <b><i class="fe-save"></i>&nbsp;&nbsp;Editar</b>
                </button>
            </div>
        </div> <!-- end card-box-->

    </div> <!-- end col -->
</div>
