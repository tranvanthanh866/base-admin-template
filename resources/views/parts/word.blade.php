@foreach($word->describes as $key => $describe)
<div class="social-share">
    <div class="float-right">
        <i class="ion-social-facebook"></i>
        <i class="ion-social-twitter"></i>
    </div>
</div>
    <div class="entry-body__el">
        <div class="pos-header">
            <div class="di-title">
                <span class="headword dpos-h_hw">
                    <span>{{ $word->name }}</span>
                </span>
            </div>
            <div class="posgram dpos-g hdib lmr-5">
                <span class="pos dpos" title="">
                    {{ $describe->wordType->name }}
                </span>
            </div>
            
            @if($describe->pronunciation)
                @if($describe->pronunciation->us_ipa != null)
                <span class="us dpron-i ">
                    <span class="region dreg">us</span>
                    <span class="daud">
                        @if ($describe->pronunciation->pronunciationAudios->count() > 0)
                        @php
                            $pronUs = $describe->pronunciation->pronunciationAudios->where('action_audio', 'us');
                        @endphp
                        @if ( $pronUs->count() >0 )
                        <amp-audio layout="nodisplay" preload="none" controlslist="nodownload" hidden="" i-amphtml-layout="nodisplay">
                            <div class="hdib" fallback="">
                                <p>Your browser doesn't support HTML5 audio</p>
                            </div>
                            <audio controls="" preload="none" id="usaudio_{{ $key }}"  controlslist="nodownload" class="i-amphtml-fill-content">
                                @foreach ($pronUs as $source)
                                <source type="{{ $source->type_audio }}" src="/storage{{ $source->url }}">
                                @endforeach
                            </audio>
                        </amp-audio>
                        <div style="display: inline-block" title="" onclick="PlaySound('usaudio_{{ $key }}')" role="button" tabindex="0">
                            <i class="ion-volume-high"></i>
                        </div>
                        @endif
                        @endif   
                    </span>
                    <span class="pron dpron">
                        /
                        <span class="ipa dipa lpr-2 lpl-1">{!! $describe->pronunciation->us_ipa  !!}</span>
                        /
                    </span>
                </span>
                @endif

                @if($describe->pronunciation->uk_ipa != null)
                <span class="uk dpron-i ">
                    <span class="region dreg">uk</span>
                    <span class="daud">
                        @if ($describe->pronunciation->pronunciationAudios->count() > 0)
                        @php
                            $pronUk = $describe->pronunciation->pronunciationAudios->where('action_audio', 'uk');
                        @endphp
                        @if ( $pronUk->count() >0 )
                        <amp-audio layout="nodisplay" preload="none" controlslist="nodownload" hidden="" i-amphtml-layout="nodisplay">
                            <div class="hdib" fallback="">
                                <p>Your browser doesn't support HTML5 audio</p>
                            </div>
                            <audio controls="" preload="none"  id="ukaudio_{{ $key }}"  controlslist="nodownload" class="i-amphtml-fill-content">
                                @foreach ($pronUk as $source)
                                <source type="{{ $source->type_audio }}" src="/storage{{ $source->url }}">
                                @endforeach
                            </audio>
                        </amp-audio>
                        <div style="display: inline-block" title=""  onclick="PlaySound('usaudio_{{ $key }}')" role="button" tabindex="0">
                            <i class="ion-volume-high"></i>
                        </div>
                        @endif
                        @endif   
                    </span>
                    <span class="pron dpron">
                        /
                        <span class="ipa dipa lpr-2 lpl-1">{!! $describe->pronunciation->uk_ipa  !!}</span>
                        /
                    </span>
                </span>
                @endif
            @endif
            
        </div>
        <div class="pos-body">
            <div class="sense-body">
                <div class="def-block">
                    <div class="dwl hax">
                        <a style="float: right">
                            <i class="ion-plus"></i>.
                        </a>
                        <hr>
                    </div>

                    <div class="ddef_h">
                        <span class="def-info ddef-info">
                            {{-- <span class="epp-xref dxref B2">B2</span>  --}}
                        </span>
                        <div class="def ddef_d db">
                            <h4>
                            {{ $describe->content }}
                            </h4>
                        </div> 
                        <div class="def-body ddef_b">
                            <ul>
                            @foreach ($describe->examples as $example)
                                <li>
                                    {{ $example->content }}
                                </li>
                            @endforeach
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endforeach