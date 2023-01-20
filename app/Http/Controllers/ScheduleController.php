<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Exercise;
use App\Http\Requests\CreateSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    //カレンダー表示
    public function index()
    {
        return view('calendar');
    }

    //部位追加ページ表示
    public function add($id)
    {
        $day = $id;
        return view('schedule.add',['day' => $day]);
    }

    //部位追加登録処理
    public function store(CreateSchedule $request,$id)
    {
        $day = $id;
        $schedule = new Schedule();

        //値を代入
        $schedule->user_id = 1;
        $schedule->start_date = $request->sch_date;
        $schedule->end_date = $request->sch_date;
        $schedule->sch_part = $request->sch_part;

        // インスタンスの状態をデータベースに書き込む
        $schedule->save();

        return redirect()->route('exe.add',['id' => $schedule->id]);
    }

    //イベントを取得
    public function scheduleGet(Request $request)
    {
        // バリデーション
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer'
        ]);

        // カレンダー表示期間
        $start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d', $request->input('end_date') / 1000);

        // 登録処理
        return Schedule::query()
            ->select(
                'start_date as start',
                'end_date as end',
                'sch_part as title'
            )
            // FullCalendarの表示範囲のみ表示
            ->where('end_date', '>', $start_date)
            ->where('start_date', '<', $end_date)
            ->get();
    }

    //詳細画面表示
    public function detail($date,$title)
    {
        //スケジュール情報を取得
        $schedule = Schedule::where('start_date',$date)->where('sch_part',$title)->first();

        // 選ばれた部位に紐づく種目を取得する
        $exercises = Exercise::where('schedule_id', $schedule->id)->get();

        return view('schedule.detail',[
            'schedule' => $schedule,
            'exercises' => $exercises,
        ]);
    }

    //削除機能
    public function delete(int $id)
    {
        //スケジュール情報を取得
        $schedule = Schedule::find($id);

        $schedule->delete();

        return redirect()->route('index');
    }
    
}
