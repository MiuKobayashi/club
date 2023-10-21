<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Announcement;
use App\Models\Desire;
use Illuminate\Support\Facades\Http;
use Tectalic\OpenAi\Manager;
use App\Jobs\ChatGptJob;

class ChatGptController extends Controller
{
    public function adminDesireView(User $user, Schedule $schedule, Announcement $announcement, Request $request)
    {
        //部員
        $users = $user->getMembers();
        $memberNames = User::pluck('name');
        
        $times = Schedule::getTimes();
        $startTime = $times['startTime'];
        $endTime = $times['endTime'];
        $Time = $times['Time'];
        
        //来月の全体の活動日
        $attendance = $schedule ->selectNextMonthLessons()
                                ->with('desires')->get();
        
        return view('lessons.admin_desire')->with([
            'users' => $users,
            'memberNames' => $memberNames,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'Time' => $Time,
            'attendances' => $attendance,
            'announcements' => $announcement->getPaginateByLimit(),
            ]);

    }
    
    public function adminPlanView(Schedule $schedule)
    {
            //来月の全体の活動日
        $attendance = $schedule ->selectNextMonthLessons()
                                ->with('desires')->get();
        
        return view('lessons.admin_plan')->with([
            'attendances' => $attendance
            ]);
    }
        
    public function adminPlanCreate(Request $request, Schedule $schedule, Desire $desire)
    {
        //来月の全体の活動日
        $attendance = $schedule ->selectNextMonthLessons()
                                ->with('desires')->get();
    
        // 希望時間
        $desireId = $request->input('sentence');
        $desires = Desire::where('schedule_id', $desireId)->with('user')->get();
    
        $sentence = "Please create 3 patterns for the order of the lessons. Please observe the following three rules.
① Practice for 30 minutes during each free time.
②The first and last person will have 60 minutes each time, and the remaining people will have 30 minutes each time.
③ Leave a 10 minute interval between lessons.
The free time for each person is as follows.\n";
        //文章作成
        foreach ($desires as $desire) {
            // 各ユーザーと対応するスケジュールの日付範囲を取得
            $userName = $desire->user->name;
            $startDate = $desire->start_time;
            $endDate = $desire->end_time;
            
            // 文章を作成して $sentence に追加
            $sentence .= $userName . ":" . $startDate. "-" . $endDate . "\n";
        }
        
        
        // ChatGPT API処理
        $chat_response = $this->chat_gpt($sentence);

        return view('lessons.admin_plan', [
            'attendances' => $attendance,
            'sentence' => $sentence,
            'chat_response' => $chat_response,
        ]);
    }
    
    
        /**
     * ChatGPT API呼び出し
     * cURL
     */
    function chat_gpt($system)
    {

        // ChatGPT APIのエンドポイントURL
        $url = "https://api.openai.com/v1/chat/completions";

        // APIキー
        $api_key = config('services.chatgpt.api_key'); // .envファイルからAPIキーを取得するコードを追加してください

        // ヘッダー
        $headers = array(
            "Content-Type: application/json",
            "Authorization: Bearer $api_key"
        );

        // パラメータ
        $data = array(
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system",
                    "content" => $system
                ]
            ]
        );
        
        // cURLセッションの初期化
        $ch = curl_init();

        // cURLオプションの設定
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // リクエストの送信と応答結果の取得
        $response = json_decode(curl_exec($ch));
        
        // cURLセッションの終了
        curl_close($ch);

        // 応答結果の取得
        if (isset($response->error)) {
            // エラー
            return $response->error->message;
        }

        return $response->choices[0]->message->content;
    }
    
}


