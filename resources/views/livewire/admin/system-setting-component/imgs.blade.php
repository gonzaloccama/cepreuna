<form class="parsley-examples">

    <div class="form-group row pb-3">
        <label for="website_logo_1st" class="col-4 col-form-label text-right text-uppercase">Logo
            <i class="text-danger">*</i>
        </label>
        <div class="col-7">
            <div class="input-group rounded-0">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="website_logo_1st" wire:model="website_logo_1st"
                           accept="image/jpeg,image/png,image/jpg">
                    <label class="custom-file-label" for="website_logo_1st">Elije una imagen</label>
                </div>
            </div>

            <div wire:loading wire:target="website_logo_1st" class="mt-1 text-danger font-italic">
                Cargando...
            </div>
            @error('website_logo_1st')
            <div class="text-danger text-errors font-italic" style="font-size: 11px;">
                {!! $message !!}
            </div>
            @enderror
            @if($website_logo_1st)
                <img src="{{ $website_logo_1st->temporaryUrl() }}"
                     class="img-thumbnail img-responsive mt-2 rounded shadow"
                     alt="" width="240">

            @elseif($edit_logo_1st)
                <img src="{{ asset('assets'.'/'.$image_path).'/'.$edit_logo_1st }}"
                     class="img-thumbnail img-responsive mt-2 rounded shadow"
                     alt="" width="240">
            @endif

        </div>
    </div>

    <div class="form-group row pb-3">
        <label for="website_logo_2sd" class="col-4 col-form-label text-right text-uppercase">Logo blanco
            <i class="text-danger">*</i>
        </label>
        <div class="col-7">
            <div class="input-group rounded-0">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="website_logo_2sd" wire:model="website_logo_2sd"
                           accept="image/jpeg,image/png,image/jpg">
                    <label class="custom-file-label" for="website_logo_2sd">Elije una imagen</label>
                </div>
            </div>

            <div wire:loading wire:target="website_logo_2sd" class="mt-1 text-danger font-italic">
                Cargando...
            </div>
            @error('website_logo_2sd')
            <div class="text-danger text-errors font-italic" style="font-size: 11px;">
                {!! $message !!}
            </div>
            @enderror
            @if($website_logo_2sd)
                <img src="{{ $website_logo_2sd->temporaryUrl() }}"
                     class="img-thumbnail img-responsive mt-2 rounded shadow"
                     alt="" width="240">

            @elseif($edit_logo_2sd)
                <img src="{{ asset('assets'.'/'.$image_path).'/'.$edit_logo_2sd }}"
                     class="img-thumbnail img-responsive mt-2 rounded shadow"
                     alt="" width="240">
            @endif

        </div>
    </div>

    <div class="form-group row pb-3">
        <label for="website_favicon" class="col-4 col-form-label text-right text-uppercase">Favicon
            <i class="text-danger">*</i>
        </label>
        <div class="col-7">
            <div class="input-group rounded-0">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="website_favicon" wire:model="website_favicon"
                           accept="image/jpeg,image/png,image/jpg">
                    <label class="custom-file-label" for="website_favicon">Elije una imagen</label>
                </div>
            </div>

            <div wire:loading wire:target="website_favicon" class="mt-1 text-danger font-italic">
                Cargando...
            </div>
            @error('website_favicon')
            <div class="text-danger text-errors font-italic" style="font-size: 11px;">
                {!! $message !!}
            </div>
            @enderror
            @if($website_favicon)
                <img src="{{ $website_favicon->temporaryUrl() }}"
                     class="img-thumbnail img-responsive mt-2 rounded shadow"
                     alt="" width="240">

            @elseif($edit_favicon)
                <img src="{{ asset('assets'.'/'.$image_path).'/'.$edit_favicon }}"
                     class="img-thumbnail img-responsive mt-2 rounded shadow"
                     alt="" width="240">
            @endif

        </div>
    </div>

    <hr>

    <div class="form-group row text-right">
        <div class="col-8 offset-4">
            <button type="reset" wire:click.prevent="closeFrame"
                    class="btn btn-primary waves-effect waves-light mr-1">
                <b><i class="fe-corner-up-left"></i>&nbsp;&nbsp;Regresar</b>
            </button>
            <button type="submit" class="btn btn-success waves-effect waves-light mr-1"
                    wire:click.prevent="logo(1)">
                <b><i class="fe-save"></i>&nbsp;&nbsp;Guardar</b>
            </button>
        </div>
    </div>
</form>
