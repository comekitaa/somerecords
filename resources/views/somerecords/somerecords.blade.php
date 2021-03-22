@if (count($somerecords) > 0)
    <ul class="list-unstyled">
        @foreach ($somerecords as $key => $somerecord)
            <li class="media mb-0">
            <table class="table">
                <tr>
                <div class="media-body border">
                    {{-- 投稿内容 --}}
                    <td class="mb-0">{!! nl2br(e($somerecord->title)) !!}</td>
                    <td class="mb-0">{!! nl2br(e($somerecord->ymd)) !!}</td>
                    <td class="mb-0">
                        <div onclick="obj=document.getElementById('open_{!! e($key) !!}').style; obj.display=(obj.display=='none')?'block':'none';">
                        <a style="cursor:pointer;">memo▼</a>
                        </div>
                        <div id="open_{!! e($key) !!}" style="display:none;clear:both;">
                        {!! nl2br(e($somerecord->memo)) !!}
                        </div>
                    </td>
                    <td>
                    @if (Auth::id() == $somerecord->user_id)
                        {{-- 編集ページへのリンク --}}
                        {!! link_to_route('somerecords.edit', '編集', ['somerecord' => $somerecord->id], ['class' => 'btn btn-light']) !!}
                        {{-- 投稿削除ボタンのフォーム --}}
                        {!! Form::open(['route' => ['somerecords.destroy', $somerecord->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                    </td>
                </div>
                </tr>
            </table>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $somerecords->links() }}
@endif