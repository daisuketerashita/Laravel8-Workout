<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/edit.css')  }}">
    <title>種目編集ページ</title>
</head>

<body>
    <div class="form-wrapper">
        <div class="form-content">
            <h3>{{ $schedule->start_date }}</h3>
            <h3>{{ $schedule->sch_part }}</h3>
            <form action="{{ route('exe.update',['id' => $schedule->id,'exe_id' => $exercise->id ]) }}" method="post" enctype="multipart/form-data">
                <div class="err-content alert-danger">
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
                </div>
                @csrf
                <table class="inner-wrapper">
                    <tr>
                        <th><label for="name">種目名：</label></th>
                        <td><input type='text' class='sch_date' name='name' value="{{ $exercise->name }}"></td>
                    </tr>
                    <tr>
                        <th><label for="weight">重さ：</label></th>
                        <td><input type="number" name="weight" value="{{ $exercise->weight }}"> kg</td>
                    </tr>
                    <tr>
                        <th><label for="repetition">レップ数：</label></th>
                        <td><input type="number" name="repetition" value="{{ $exercise->repetition }}"> 回</td>
                    </tr>
                    <tr>
                        <th><label for="set_num">セット数：</label></th>
                        <td><input type="number" name="set_num" value="{{ $exercise->set_num }}"> セット</td>
                    </tr>
                    <tr>
                        <th class="memo_th"><label for="exe_contents">メモ：</label></th>
                        <td class="memo_td"><textarea name="exe_contents" id="" cols="30" rows="10">{{ $exercise->exe_contents }}</textarea></td>
                    </tr>
                    <tr class="inner-button">
                        <td colspan="2"><input type='submit' class='form-btn next-btn' value='編集'></td>
                    </tr>
                    <tr class="inner-button">
                        <td colspan="2"><button type="button" class='form-btn prev-btn' onclick="location.href='{{ route('exe.delete',['id' => $schedule->id,'exe_id' => $exercise->id]) }}'">削除</button></td>
                    </tr>
                    <tr class="inner-button">
                        <td colspan="2"><button type="button" class='form-btn prev-btn' onclick="location.href='{{ route('detail',['date' => $schedule->start_date,'title' => $schedule->sch_part]) }}' ">戻る</button></td>
                    </tr>
                </table>
            </form>
        </div><!-- /.form-content -->
    </div><!-- /.form-wrapper -->
</body>

</html>