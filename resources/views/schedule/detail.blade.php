<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/reset.css')  }}">
    <link rel="stylesheet" href="{{ asset('/css/detail.css')  }}">
    <title>詳細ページ</title>
</head>

<body>
    <div class="main_wrapper">
        <div class="content_wrapper">
            <div class="part_content">
                <h3><span>【日付】</span>{{ $schedule->start_date }}</h3>
                <h3><span>【部位】</span>{{ $schedule->sch_part }}</h3>
            </div><!-- /.part_content -->
            <div class="exe_content">
                <ul>
                    @foreach($exercises ?? '' as $exercise)
                    <li><span>種目名：</span>{{ $exercise->name }}</li>
                    <li><span>重さ：</span>{{ $exercise->weight }}kg</li>
                    <li><span>レップ数：</span>{{ $exercise->repetition }}回</li>
                    <li><span>セット数：</span>{{ $exercise->set_num }}セット</li>
                    <li><span>メモ：</span>{{ $exercise->exe_contents }}</li>
                    <button type="button" class='form-btn prev-btn' onclick="location.href='{{ route('exe.edit',['id' => $schedule->id,'exe_id' => $exercise->id]) }}'">編集</button>
                    <hr>
                    @endforeach
                </ul>
                <p><button type="button" class='form-btn prev-btn' onclick="location.href='{{ route('exe.add',['id' => $schedule->id]) }}'">追加</button></p>
                <p><button type="button" class='form-btn prev-btn' onclick="location.href='{{ route('sch.delete',['id' => $schedule->id]) }}'">削除</button></p>
            </div><!-- /.exe_content -->
        </div><!-- /.content_wrapper -->
        <a href="{{ route('index') }}">戻る</a>
    </div><!-- /.main_wrapper -->
</body>

</html>