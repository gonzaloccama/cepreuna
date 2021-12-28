<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="card-widgets">

                <a href=""><i class="mdi mdi-refresh" wire:click.prevent="cleanItems"></i></a>

                <a href="" wire:click.prevent="closeFrame"><i class="mdi mdi-close"></i></a>

            </div>
            <h4 class="header-title text-uppercase">{{ $user_firstname . ' ' . $user_lastname }}</h4>

            <hr>

            <ul class="nav nav-tabs nav-bordered nav-justified mt-3">
                <li class="nav-item">
                    <a href="#home-b2" data-toggle="tab" aria-expanded="false"
                       class="nav-link {{ $tab==1?'active':'' }}" wire:click.prevent="tab(1)">
                        CUENTA
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile-b2" data-toggle="tab" aria-expanded="true"
                       class="nav-link {{ $tab==2?'active':'' }}" wire:click.prevent="tab(2)">
                        PERFIL DE USUARIO
                    </a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane {{ $tab==1?'active':'' }}" id="home-b2">
                    <form class="parsley-examples">
                        @php
                            $dt = [
                                'name' => 'user_verified',
                                'text' => 'Usuario verificado',
                                'required' => 1,
                                'type' => 'checkbox-h',
                            ];
                        @endphp
                        @include('livewire.widgets.form.input', $dt)

                        @php
                            $dt = [
                                'name' => 'user_banned',
                                'text' => 'Usuario baneado',
                                'required' => 1,
                                'type' => 'checkbox-h',
                            ];
                        @endphp
                        @include('livewire.widgets.form.input', $dt)

                        @php
                            $dt = [
                                'name' => 'user_activated',
                                'text' => 'Usuario activo',
                                'required' => 1,
                                'type' => 'checkbox-h',
                            ];
                        @endphp
                        @include('livewire.widgets.form.input', $dt)

                        @php
                            $dt = [
                                'name' => 'role',
                                'text' => 'Rol de usuario',
                                'required' => 1,
                                'type' => 'role',
                                'options' => \App\Models\Role::all(),
                            ];
                        @endphp
                        @include('livewire.widgets.form.select', $dt)

                        @php
                            $dt = [
                                'name' => 'username',
                                'text' => 'Nombre de usuario',
                                'required' => 1,
                                'type' => 'text-h',
                            ];
                        @endphp
                        @include('livewire.widgets.form.input', $dt)

                        @php
                            $dt = [
                                'name' => 'email',
                                'text' => 'Email',
                                'required' => 1,
                                'type' => 'text-h',
                            ];
                        @endphp
                        @include('livewire.widgets.form.input', $dt)

                        @php
                            $dt = [
                                'name' => 'phone',
                                'text' => 'Celular',
                                'required' => 1,
                                'type' => 'text-h',
                            ];
                        @endphp
                        @include('livewire.widgets.form.input', $dt)

                        @php
                            $dt = [
                                'name' => 'new_user_cover',
                                'text' => 'Avatar',
                                'required' => 1,
                                'type' => 'file-h',
                                'file' => $new_user_cover,
                                'editFile' => $edit_user_cover,
                            ];
                        @endphp
                        @include('livewire.widgets.form.input', $dt)

                        <hr>

                        <div class="form-group row text-right">
                            <div class="col-8 offset-4">
                                <button type="reset" wire:click.prevent="closeFrame"
                                        class="btn btn-primary waves-effect waves-light mr-1">
                                    <b><i class="fe-corner-up-left"></i>&nbsp;&nbsp;Regresar</b>
                                </button>
                                <button type="reset" wire:click.prevent="deleteConfirm({{ $itemId }})"
                                        class="btn btn-danger waves-effect waves-light mr-1">
                                    <b><i class="fe-trash-2"></i>&nbsp;&nbsp;Eliminar</b>
                                </button>
                                <button type="submit" class="btn btn-success waves-effect waves-light mr-1"
                                        wire:click.prevent="updateRegister">
                                    <b><i class="fe-save"></i>&nbsp;&nbsp;Guardar cambios</b>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane {{ $tab==2?'active':'' }}" id="profile-b2">
                    <form class="parsley-examples">
                        <div class="pt-1 pb-3">
                            <div class="grid-container bg-light p-2 text-center mb-3">
                                <h4 class="p-0 m-0 text-uppercase font-weight-light">Información personal</h4>
                            </div>
                            @php
                                $dt = [
                                    'name' => 'user_dni',
                                    'text' => 'DNI',
                                    'required' => 1,
                                    'type' => 'text-h',
                                ];
                            @endphp
                            @include('livewire.widgets.form.input', $dt)

                            @php
                                $dt = [
                                    'name' => 'user_firstname',
                                    'text' => 'Nombres',
                                    'required' => 1,
                                    'type' => 'text-h',
                                ];
                            @endphp
                            @include('livewire.widgets.form.input', $dt)

                            @php
                                $dt = [
                                    'name' => 'user_lastname',
                                    'text' => 'Apellidos',
                                    'required' => 1,
                                    'type' => 'text-h',
                                ];
                            @endphp
                            @include('livewire.widgets.form.input', $dt)

                            @php
                                $dt = [
                                    'name' => 'user_birthdate',
                                    'text' => 'Fecha de nacimiento',
                                    'required' => 1,
                                    'type' => 'date-h',
                                ];
                            @endphp
                            @include('livewire.widgets.form.input', $dt)

                            @php
                                $dt = [
                                    'name' => 'user_gender',
                                    'text' => 'Sexo',
                                    'required' => 1,
                                    'type' => 'gender',
                                    'options' => \App\Models\Gender::all(),
                                ];
                            @endphp
                            @include('livewire.widgets.form.select', $dt)

                            @php
                                $dt = [
                                    'name' => 'user_biography',
                                    'text' => 'Biografía',
                                    'required' => 1,
                                    'type' => 1,
                                ];
                            @endphp
                            @include('livewire.widgets.form.textarea', $dt)
                        </div>

                        <div class="pt-1 pb-3">
                            <div class="grid-container bg-light p-2 text-center mb-3">
                                <h4 class="p-0 m-0 text-uppercase font-weight-light">Dirección</h4>
                            </div>

                            @php
                                $dt = [
                                    'name' => 'user_address',
                                    'text' => 'Dirección',
                                    'required' => 1,
                                    'type' => 'text-h',
                                ];
                            @endphp
                            @include('livewire.widgets.form.input', $dt)

                            @php
                                $dt = [
                                    'name' => 'user_region',
                                    'text' => 'Región',
                                    'required' => 1,
                                    'type' => 'region',
                                    'options' => \App\Models\Region::all(),
                                ];
                            @endphp
                            @include('livewire.widgets.form.select', $dt)

                            @php
                                $p = [];
                                if ($user_region) {
                                    $p = json_decode(\App\Models\Region::find($user_region)->province);
                                }

                                $dt = [
                                    'name' => 'user_province',
                                    'text' => 'Provincia',
                                    'required' => 1,
                                    'type' => 'array',
                                    'options' => $p,
                                ];
                            @endphp
                            @include('livewire.widgets.form.select', $dt)
                        </div>

                        <hr>

                        <div class="form-group row text-right">
                            <div class="col-8 offset-4">
                                <button type="reset" wire:click.prevent="closeFrame"
                                        class="btn btn-primary waves-effect waves-light mr-1">
                                    <b><i class="fe-corner-up-left"></i>&nbsp;&nbsp;Regresar</b>
                                </button>
                                <button type="reset" wire:click.prevent="deleteConfirm({{ $itemId }})"
                                        class="btn btn-danger waves-effect waves-light mr-1">
                                    <b><i class="fe-trash-2"></i>&nbsp;&nbsp;Eliminar</b>
                                </button>
                                <button type="submit" class="btn btn-success waves-effect waves-light mr-1"
                                        wire:click.prevent="updateRegister">
                                    <b><i class="fe-save"></i>&nbsp;&nbsp;Guardar cambios</b>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div> <!-- end card-box -->
    </div><!-- end col-->
</div>

