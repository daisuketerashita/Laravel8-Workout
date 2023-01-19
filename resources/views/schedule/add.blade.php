<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/style.css')  }}">
    <title>追加ページ</title>
</head>

<body>
    <div class="form-wrapper">
        <div class="form-content">
            <form action="{{ route('store',['id' => $day]) }}" method="post" enctype="multipart/form-data">
                <div class="err-content alert-danger">
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
                </div>
                @csrf
                <table class="inner-wrapper">
                    <tr>
                        <th><label for="sch_date">日付：</label></th>
                        <td><input type='text' class='sch_date' name='sch_date' value="{{ $day }}"></td>
                    </tr>
                    <tr>
                        <th>
                            <label for="sch_part">部位：</label>
                        </th>
                        <td>
                            <input type="radio" name="sch_part" value="胸" class="sch_part" id="sch_chest"><label for="sch_chest">胸</label>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="radio" name="sch_part" value="脚" class="sch_part" id="sch_leg"><label for="sch_leg">脚</label>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="radio" name="sch_part" value="背中" class="sch_part" id="sch_back"><label for="sch_back">背中</label>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="radio" name="sch_part" value="腕" class="sch_part" id="sch_arm"><label for="sch_arm">腕</label>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="radio" name="sch_part" value="肩" class="sch_part" id="sch_shoulder"><label for="sch_shoulder">肩</label>
                        </td>
                    </tr>

                    <tr class="inner-button">
                        <td colspan="2"><input type='submit' class='form-btn next-btn' value='種目管理画面へ'></td>
                    </tr>
                    <tr class="inner-button">
                        <td colspan="2"><button type="button" class='form-btn prev-btn' onclick="location.href='{{ route('index') }}' ">戻る</button></td>
                    </tr>
                </table>
            </form>
        </div><!-- /.form-content -->
    </div><!-- /.form-wrapper -->
</body>

</html>