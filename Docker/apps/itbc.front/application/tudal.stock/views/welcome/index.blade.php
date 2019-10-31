@extends('layouts.default')
@push('js')
    <script type="text/javascript">
        function move_page(page)
        {
            document.getElementById('page').value   = page;
            document.getElementById('index-form').submit();
        }
        function do_search()
        {
            document.getElementById('index-form').submit();
        }

        function aa() {

        }
    </script>
@endpush

@push('css')

@endpush

@section('title')
    {{$title}}
@endsection

@section('content')
    <div>
        {!! form_open('/',['id'=>'index-form','name'=>'index-form','method'=>'get']) !!}
            <input type="hidden" id="page" name="page" value="{{$datas['list']->contents->paginations->page}}">
            <input type="hidden" name="per_page" value="{{$datas['list']->contents->paginations->perPage}}">
            <input type="text" name="where[title]" value="{{@$where['title']}}"/>
            <input type="submit" value="검색"/>
        {!! form_close() !!}

        {!! form_open('/',['id'=>'show-form','name'=>'show-form','method'=>'get']) !!}

        {!! form_close() !!}

        {!! form_open('/',['id'=>'show-form','name'=>'show-form','method'=>'post']) !!}

        {!! form_close() !!}
        {!! form_open('/',['id'=>'show-form','name'=>'show-form','method'=>'put']) !!}

        {!! form_close() !!}
        {!! form_open('/',['id'=>'show-form','name'=>'show-form','method'=>'delete']) !!}

        {!! form_close() !!}
    </div>
    <div>
        <table>
            <thead>
                <th>번호2</th>
                <th>제목</th>
                <th>등록일</th>
                <th>등록자</th>
            </thead>
            <tbody>
                @foreach($datas['list']->contents->items as $v)
                <tr>
                    <td>{{$v->board_seq}}</td>
                    <td><a href="#">{{$v->title}}</a></td>
                    <td>{{$v->created_at}}</td>
                    <td>{{$v->writer}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>

                    </td>
                </tr>
            </tfoot>
        </table>
        <div>
            <button onclick="move_page(1)">1</button>
            <button onclick="move_page(2)">1</button>
            <button onclick="move_page(3)">1</button>
            <a href="/?page=1">1</a>

        </div>
    </div>
@endsection

