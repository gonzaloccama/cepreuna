<div class="map-with-pattern p-0 m-0">
    <?php
    $settings = \App\Models\SystemSetting::find(1);
    $socials = json_decode($settings->website_media_social);
    ?>

    <div class="container">
        <iframe style="width: 100%; height: 320px;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1613.7705845990067!2d-70.02356842995145!3d-15.845297483774756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915d69eaea3b9315%3A0xb8b5a947f95796a2!2sCEPREUNA!5e0!3m2!1ses!2spe!4v1637343855850!5m2!1ses!2spe"></iframe>
        <div class="contact-pattern">
            <img src="{{ asset('assets/images/contact/pattern.png') }}" class="pt-3 mt-3" alt="Pattern">
        </div>
        <hr>
    </div>
</div>

@if(filled($socials[0]))
    <div class="contact-form-area pt-2 pb-5">
        <div class="container">
            <div class="template-demo pb-2 text-center">
                @foreach($socials[0] as $key => $social)
                    @if(isset($social) && !empty($social))
                        <a href="{{ $social }}" class="btn btn-social-icon btn-outline-{{ $key }}"
                           target="_blank"> <i class="fa fa-{{ $key }}"></i>
                        </a>
                    @endif
                @endforeach
            </div>
            <hr>
        </div>
    </div>
@endif

<div class="contact-form-area pt-5 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="contact-form-title mb-2" style="font-size: 36px;">Dejenos su mensaje</h2>
                <form id="contact-form" class="contact-form pt-10">

                    <div class="form-field">
                        <input type="text" name="con_name" id="con_name" placeholder="Nombres y Apellidos*"
                               class="input-field me-6 form-contact @error('names') is-invalid @enderror"
                               wire:model="names">
                        @error('names')
                        <div class="text-danger pl-2 font-italic" style="font-size: 13px;">
                            {!! $message !!}
                        </div>
                        @enderror
                    </div>

                    <div class="form-field mt-4">
                        <input type="text" name="con_email" id="con_email" placeholder="Correo Electrónico*"
                               class="input-field mt-6 mt-sm-0 form-contact @error('email') is-invalid @enderror"
                               wire:model="email">
                        @error('email')
                        <div class="text-danger col-6 pl-2 font-italic" style="font-size: 13px;">
                            {!! $message !!}
                        </div>
                        @enderror
                    </div>

                    <div class="form-field mt-4">
                        <input type="text" name="con_phone" id="con_phone" placeholder="Celular*"
                               class="input-field me-6 form-contact @error('phone') is-invalid @enderror"
                               wire:model="phone">
                        @error('phone')
                        <div class="text-danger col-6 pl-2 font-italic me-3" style="font-size: 13px;">
                            {!! $message !!}
                        </div>
                        @enderror
                    </div>

                    <div class="form-field mt-4">
                        <input type="text" name="con_subject" id="con_subject" placeholder="Asunto*"
                               class="input-field me-6 form-contact @error('subject') is-invalid @enderror"
                               wire:model="subject">
                        @error('subject')
                        <div class="text-danger col-6 pl-2 font-italic me-3" style="font-size: 13px;">
                            {!! $message !!}
                        </div>
                        @enderror
                    </div>
                    <div class="form-field mt-4">
                        <textarea name="con_message" id="con_message" placeholder="Mensaje"
                                  class="textarea-field form-contact @error('message') is-invalid @enderror"
                                  wire:model="message"
                                  style="height: 100px;"></textarea>
                        @error('message')
                        <div class="text-danger col-6 pl-2 font-italic me-3" style="font-size: 13px;">
                            {!! $message !!}
                        </div>
                        @enderror
                    </div>

                    @if (session()->has('message'))
                        <div class="alert alert-success rounded-0">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="button-wrap mt-8">
                        <button class="btn btn-custom btn-secondary btn-primary-hover"
                                wire:click.prevent="saveContact">Enviar
                        </button>
                        <p class="form-messege mt-5 mb-0"></p>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 ps-lg-10">
                <div class="contact-content">
                    <h6 class="title mb-2" style="font-size: 36px;">Contacta con nosotros</h6>
                    <p class="short-desc mb-0">{{ __('') }}</p>
                    <div class="contact-info pt-1">
                        <h3 class="title mb-0" style="font-size: 24px;">Dirección de la oficina</h3>
                        @foreach(json_decode($settings->website_addresses) as $address)
                            @if(isset($address) && !empty($address))
                                <p class="short-desc mb-0">{{ $address }}</p>
                            @endif
                        @endforeach
                        <hr class="w-50">
                    </div>
                    <div class="contact-info pt-2">
                        <h3 class="title mb-0" style="font-size: 24px;">Datos de contacto</h3>
                        <ul>
                            @foreach(json_decode($settings->website_phones) as $phone)
                                @if(isset($phone) && !empty($phone))
                                    <li>
                                        Teléfono:
                                        <a href="tel:{{ $phone }}">{{ $phone }}</a>
                                    </li>
                                @endif
                            @endforeach
                            <hr class="w-50">
                            @foreach(json_decode($settings->website_emails) as $email)
                                @if(isset($email) && !empty($email))
                                    <li>
                                        Email:
                                        <a class="text-lowercase" href="mailto:{{ $email }}">{{ $email }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<div class="container">--}}
{{--    <div class="calendarDate">--}}
{{--        <em>Saturday</em>--}}
{{--        <strong>December</strong>--}}
{{--        <span>21</span>--}}
{{--    </div>--}}
{{--</div>--}}
