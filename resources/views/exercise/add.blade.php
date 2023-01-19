<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/exercise.css')  }}">
    <title>種目追加ページ</title>
</head>

<body>
    <div class="form-wrapper">
        <div class="form-content">
            <form action="{{ route('exe.store',['id' => $schedule_id]) }}" method="post" enctype="multipart/form-data">
                <div class="err-content alert-danger">
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
                </div>
                @csrf
                <table class="inner-wrapper">
                    <tr>
                        <th><label for="name">種目名：</label></th>
                        <td><input type='text' class='sch_date' name='name'></td>
                    </tr>
                    <tr>
                        <th><label for="weight">重さ：</label></th>
                        <td><input type="number" name="weight"> kg</td>
                    </tr>
                    <tr>
                        <th><label for="repetition">レップ数：</label></th>
                        <td><input type="number" name="repetition"> 回</td>
                    </tr>
                    <tr>
                        <th><label for="set_num">セット数：</label></th>
                        <td><input type="number" name="set_num"> セット</td>
                    </tr>
                    <tr>
                        <th class="memo_th"><label for="exe_contents">メモ：</label></th>
                        <td class="memo_td"><textarea name="exe_contents" id="" cols="30" rows="10"></textarea></td>
                    </tr>
                    <tr class="inner-button">
                        <td colspan="2"><input type='submit' class='form-btn next-btn' value='登録'></td>
                    </tr>
                </table>
            </form>
        </div><!-- /.form-content -->
    </div><!-- /.form-wrapper -->
</body>

</html>