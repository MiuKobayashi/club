# Sakura STLINKS
![ホーム画面](public/images/home1.png "home1")
![ホーム画面](public/images/home2.png "home2")
![ホーム画面](public/images/home3.png "home3")

## 概要
所属する箏曲部のための、サークル活動サポートアプリ<br>
個人開発<br>
制作期間：制作中（2023/7～）<br>

サイトURL：https://sakurastlinks-8ce811838701.herokuapp.com<br>
**※ログインが必須となるため、ご覧になりたい場合は以下のテストアカウントにてログインしてください。**
- Name：test
- Email：test@email.com
- Password：test2025
<hr>

## 制作の動機
部長を務める箏曲部では、以下のような作業をすべて、連絡アプリや口頭で行なっている。<br>

- お稽古の日時希望のアンケート
- 今月の活動日程の共有
- 現在お稽古中の曲の把握
- 本番で演奏する曲とパートの周知
- お稽古の出欠確認
- お稽古代の計算と周知
- 過去に演奏した曲の把握 etc...

そのため部員も部長も、忙しい毎日の中でアンケートの回答や連絡といった作業を行わなければならない現状があった。<br>
作業を自動化・効率化してこれらの煩雑さを解決できれば、お箏の練習や部員同士のコミュニケーションといった、最も大切な活動内容に充てられる時間が増加するのではないかと考え、制作するに至った。
<hr><br>

## 使用技術
- PHP 8.0.2
- HTML/CSS
- JavaScript
- Laravel 9.52.15
- Tailwind 3.3.3
- MySQL 10.2.38
- FullCalendar 6.1.8
- Heroku 
- Heroku Postgres
- GitHub
<hr>

<!-- ## アーキテクチャ
<img src="https://user-images.githubusercontent.com/70557787/193438843-8ba6a83c-a515-4783-b38a-f6f30d3b8755.png">
<hr> -->

## 機能
### 一般ユーザー（部員）
- お知らせ閲覧機能
- お稽古代確認機能
- 活動のカレンダー閲覧機能
- お稽古の進捗の閲覧、登録機能
- 曲目・パート閲覧機能
- お稽古希望日時の申請・申請内容確認機能

### 管理ユーザー（執行代）
一般ユーザーに加えて、以下の機能を有する。<br>
- お知らせの投稿・編集・削除機能
- 活動日程登録・削除機能
- 曲目・パートの登録機能
- 部員名簿閲覧機能
- お稽古希望日時の閲覧機能

### その他
- ログイン機能
- お知らせのページネーション機能
- URLの直打ち防止機能
- 入力フォームのエラーメッセージ機能 etc...
<hr><br>


## こだわった点
### デザイン
さくらをイメージし、ピンクをテーマカラーとして画面の配色やロゴをデザインした。<br>
ヘッダーでは、項目にアイコンを加えて見やすくした。<br>

### 使いやすさ
時間短縮が目的のため、操作性を高めることを意識した。<br>
- ヘッダーの固定　ーー画面遷移を容易に
- 管理者画面のスクロールに合わせて移動するボタン　ーーカレンダーへのイベント登録を容易に
- 登録画面のセレクトボックスの連動　ーー曲を選択したらその曲のパートのみが選択できるようにする、といった仕様に

### カレンダー
FullCalendarを導入し、以下の機能を実装した。
- 編集・閲覧の切り替え　ーー部員は閲覧のみ、部長はイベントの登録可
- 終日イベントと時間指定イベントの表示切替　ーーお稽古を行う日と個人のお稽古時間の表示を分ける
- 「自分の予定」「部員の予定」ボタン　ーーデフォルトでは自分のお稽古のみを表示、前後の人の予定も見ることができる
- イベントの色分け　ーー「お稽古」「合奏練習」「その他」でカラーを分類

### URLの直打ち防止を徹底した
URLを直打ちすることで、以下のことが起きる可能性がある。<br>
- 部外の他者のアクセス
- 一般ユーザーの管理者画面へのアクセス
そのため、ログイン情報を用いた判定でアクセス権を制御し、情報の信頼性を担保した。<br>
なお、URLを直打ちするとログイン画面にリダイレクトされるように設定した。

<!-- 
### スマホ対応
レビューを投稿する大学生はPCを使う可能性がある一方で、受験生は基本的にスマホで利用すると考えられるため、レスポンシブデザインを意識した。 -->

### 可読性・処理速度
可読性・処理速度を高めるため、共通部分を関数化した。


<hr><br>

## 今後追加したい機能
- 一度にすべてのお稽古希望時間を申請できる機能
- カレンダーに部員の授業時間割を表示する機能
- お稽古時間申請に登録した授業時間割を反映する機能
- お知らせのメール通知機能
- お稽古希望時間申請の締め切り設定
- お稽古順案の自動生成機能
<hr><br>

<!-- ## スクリーンショット
### レビューの投稿画面
<img src="https://user-images.githubusercontent.com/70557787/192693275-72d3886d-7a54-4d42-8dfe-996686d5f3c1.png">
<img src="https://user-images.githubusercontent.com/70557787/192693366-2f498d75-e127-4ed7-9f54-69cb298e35d9.png">
<br>

### レビューの投稿者（大学生）のプロフィール画面
<img src="https://user-images.githubusercontent.com/70557787/192445726-6b564c75-4897-46f2-8c5b-911c155fae89.png">
<img src="https://user-images.githubusercontent.com/70557787/192445886-74094eaf-937f-419a-90ad-c31e73b2ca32.png">
※「編集」「削除」ボタンは、レビューを投稿した大学生本人にしか表示されません。 -->