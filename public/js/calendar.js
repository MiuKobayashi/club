import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";
import axios from 'axios';


var calendarEl = document.getElementById("calendar");
let userId = null;
let memberName = "お稽古";

if (document.getElementById("user_id") != null) {
    let memberId = document.getElementById("user_id");
    memberId.addEventListener("change", function(){
        userId = memberId.value;
        // 選択された部員の名前をプロンプトにあらかじめ入力
        const selectedOption = memberId.options[memberId.selectedIndex];
        memberName = selectedOption.text;
    });
}


let activeButtonId = "myLessons"; // 初期値を設定

let calendar;

// ボタンがクリックされたときの処理
if (document.getElementById("myLessons") != null) {
    document.getElementById("myLessons").addEventListener("click", function () {
        activeButtonId = "myLessons";
        calendar.refetchEvents();
    });
}

if (document.getElementById("allLessons") != null) {
    document.getElementById("allLessons").addEventListener("click", function () {
        activeButtonId = "allLessons";
        calendar.refetchEvents();
    });
}


if (calendarEl != null) {
    calendar = new Calendar(calendarEl, {
        
        plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin],
        initialView: "timeGridWeek",
        firstDay: 1,
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,listMonth",
        },
    
        navLinks: true,
    
        //時間表示を制限
        views: {
            timeGridWeek: {
                slotLabelFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    hour12: false
                },
                slotMinTime: '9:00:00',
                slotMaxTime: '21:00:00'
            }
        },
        
         //全量表示
        contentHeight: 'auto',
        
        //現在の時刻に赤線ボーダーを表示
        nowIndicator: true,
	    
	    
	    //時間をhh:mm表記に
	    eventTimeFormat: { hour: 'numeric', minute: '2-digit', hour12:false},
	
    	//イベントの時間を表示
    	displayEventTime: true,
    	displayEventEnd: {
    	    month: true,
    	    basicWeek: true,
    	    "default": true
    	},
    	
        dayHeaderContent: function(info) {
                // スマートフォンの場合のカスタムテキスト
                if (window.innerWidth <= 600) { // 600px以下はスマートフォンとみなす
                    const date = info.date.getDate(); // 日にち
                    const dayOfWeek = info.date.toLocaleDateString('en-US', { weekday: 'short' }).slice(0, 1);
                    return `${date}\n${dayOfWeek}`;
                }
                // デフォルトのテキスト
                return info.text;
        },
        
    	//時間を10分間隔に
    	slotDuration: Duration,
	
        slotLabelInterval: '01:00',
    
        //イベントを四角枠で表示
        eventDisplay: 'block',
	
    	//時間を選択した時のplaceholderを設定
    	selectMirror: true,
	

        // 日付をクリック、または範囲を選択したイベント
        selectable: Boolean(isAdmin),
        
        select: function (info) {
            // 入力ダイアログ
            const eventName = prompt("イベントを入力してください", memberName);
        
            if (eventName) {
                // イベントが終日の場合は allDay を true に、それ以外の場合は false に設定
                const allDay = info.allDay;
        
                // Laravelの登録処理の呼び出し
                axios
                    .post("/schedule-add", {
                        start_date: info.start.valueOf(),
                        end_date: info.end.valueOf(),
                        event_name: eventName,
                        user_id: userId,
                        all_day: allDay, // 終日イベントかどうかをセット
                    })
                    .then(() => {
                        // イベントの追加
                        calendar.addEvent({
                            title: eventName,
                            start: info.start.valueOf(),
                            end: info.end.valueOf(),
                            allDay: allDay, // allDay プロパティを設定
                        });
                    })
                    .catch(() => {
                        alert("登録できません");
                    });
            }
        },

    
        events: function (info, successCallback, failureCallback) {
            //デフォルトのURL
            let url = "/schedule-get";
                if (activeButtonId === "allLessons") {
                    //allLessonsボタンがクリックされたとき
                    url = "/schedule-getAll"; 
                }

            axios
                .post(url, {
                    start_date: info.start.valueOf(),
                    end_date: info.end.valueOf(),
                })
                .then((response) => {
                    calendar.removeAllEvents();
                    successCallback(response.data);
                })
                .catch(() => {
                    alert("表示できません");
                });
            
        },
    

        eventClick: function (info, successCallback, failureCallback) {
            const result = confirm("削除しますか？");
            if (result) {
                if (info.timeText == "0:00") {
            info.event.setAllDay(true);
        }
                axios.post("/schedule-delete",{
                        id: info.event.id,
                    })
                    .then((response) => {
                        info.event.remove();
                        successCallback(response.data);
                    })
                    .catch(() => {
                        console.log("削除できませんでした");
                    });
            }
        },
    
            //イベントによって色を変える
            eventDidMount: function (info) {
                if (info.event._def.title=='お稽古' || memberNames.includes(info.event._def.title)) {
                    info.el.style.background='#bfccd9',
                    info.el.style.borderColor='#bfccd9',
                    info.el.style.color='#58535E';
                } else if (info.event._def.title=='合奏練習') {
                    info.el.style.background='#d8bfd8',
                    info.el.style.borderColor='#d8bfd8',
                    info.el.style.color='#58535E';
                } else {
                    info.el.style.background='#d9bfbf',
                    info.el.style.border='#d9bfbf',
                    info.el.style.color='#58535E';
                }
            },        
        }
    );
    
        calendar.render();
    }
