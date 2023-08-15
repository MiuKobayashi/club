import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";
import axios from 'axios';

var calendarEl = document.getElementById("calendar");

let calendar = new Calendar(calendarEl, {
    plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin],
    initialView: "dayGridMonth",
    firstDay: 1,
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth,timeGridWeek,listWeek",
    },
    navLinks: true,
    businessHours:
  {
    daysOfWeek: [ 1, 2, 3, 4, 5 ], 
    startTime: '09:00',
    endTime: '20:00'
  },
    editable: false,
    locale: "ja",

    // 日付をクリック、または範囲を選択したイベント
    selectable: true,
    select: function (info) {

        // 入力ダイアログ
        const eventName = prompt("イベントを入力してください");

        if (eventName) {
            // Laravelの登録処理の呼び出し
            axios
                .post("/schedule-add", {
                    start_date: info.start.valueOf(),
                    end_date: info.end.valueOf(),
                    event_name: eventName,
                })
                .then(() => {
                    // イベントの追加
                    calendar.addEvent({
                        title: eventName,
                        start: info.start,
                        end: info.end,
                        allDay: true,
                    });
                })
                .catch(() => {
                    alert("登録できません");

                });
        }
        
        
    },
    
    events: function (info, successCallback, failureCallback) {
        axios
            .post("/schedule-get", {
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
        console.log(`/schedule-delete/${info.event.id}`);
            axios.post("/schedule-delete",{
                    id: info.event.id,
                })
                .then((response) => {
                    info.event.remove();
                    successCallback(response.data);
                })
                .catch(() => {
                    alert("削除できませんでした");
                });
    }
});
calendar.render();