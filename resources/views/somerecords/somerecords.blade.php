@if (count($somerecords) > 0)
    <ul class="list-unstyled">
        @foreach ($somerecords as $somerecord)
            <li class="media mb-3">
                <div class="media-body">
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($somerecord->title)) !!}</p>
                        <p class="mb-0">{!! nl2br(e($somerecord->memo)) !!}</p>
                        <p class="mb-0">{!! nl2br(e($somerecord->ymd)) !!}</p>
                    </div>
                    <div>
                        @if (Auth::id() == $somerecord->user_id)
                            {{-- 編集ページへのリンク --}}
                            {!! link_to_route('somerecords.edit', '編集', ['somerecord' => $somerecord->id], ['class' => 'btn btn-light']) !!}
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['somerecords.destroy', $somerecord->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $somerecords->links() }}
@endif