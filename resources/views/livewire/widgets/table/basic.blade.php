<div class="table-responsive">
    {{ $results->links('livewire.widgets.pagination.detail') }}
    <table class="table table-hover table-centered  m-0" style="font-size: 12px">
        <thead class="thead-light">
        <tr>
            @foreach($headers as $key => $header)
                @if($key != 'not')
                    <th class="{{ $col[$key] }}">
                        <a href="javascript:;" wire:click.prevent="changeSort('{{ $key }}')"
                           class="{{ $fieldSort == $key ? ' text-primary' : 'text-dark' }}">
                            {{ $header }} <i
                                class="fas {{ $fieldSort == $key ? $iconSort.' text-primary' : 'mdi mdi-unfold-more-horizontal' }}"></i>
                        </a>
                    </th>
                @else
                    <th class="text-dark">
                        {{ $header }}
                    </th>
                @endif
            @endforeach
        </tr>
        </thead>
        <tbody>


        @foreach($results as $item)
            <tr>
                @foreach(array_keys($headers) as $header)

                    @if(!in_array($header, ['not', 'status', 'user_activated', 'url', 'image']))
                        <td>
                            @if(isset($setting[$header]) && !empty($setting[$header]))
                                <p class="m-0 font-weight-normal">{{ $this->timeElapsedString($item[$header]) }}</p>
                            @else
                                <p class="m-0 font-weight-normal">{{ $item[$header] }}</p>
                            @endif
                        </td>
                    @elseif($header == 'status' || $header == 'user_activated')
                        <td>
                            <span class="rounded-0 badge {{ (int)$item[$header]?'badge-success-1':'badge-danger-1' }}">
                                {{ $item[$header]?'Activo':'Inactivo' }}
                            </span>
                        </td>
                    @elseif($header == 'url')
                        <td>
                            <a href="{{ $item[$header] }}" class="btn btn-primary btn-xs waves-effect" target="_blank">IR</a>
                        </td>
                    @elseif($header == 'image')
                        <td>
                            <div class="img-thumbnail img-fluid"
                                 style="background-image: url('{{ asset($img_path).'/'. $item[$header] }}');
                                     width: auto; height: 80px; background-size: cover;"></div>
                        </td>
                    @else
                        <td>
                            <div class="btn-group dropleft">
                                <button type="button" class="btn btn-dark btn-xs"><i class="fe-settings"></i></button>
                                <button type="button" class="btn btn-dark btn-xs dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-chevron-down"></i>
                                </button>

                                <div class="dropdown-menu">
                                    @include('livewire.widgets.table.btn-action')
                                </div>
                            </div><!-- /btn-group -->
                        </td>
                    @endif
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
{{ $results->links('livewire.widgets.pagination.admin') }}
