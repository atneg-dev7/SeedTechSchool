## myplayers

myplayersは、野球選手のコレクションアプリ。
『"推し"の選手の情報を集めてコレクションしたい』というユーザーの声を叶えるために開発されたサービスです。

## 使い方

myplayersでは2022/3/19現在、以下の機能が利用できます。 

- お気に入り選手の複数登録・編集
- 登録済み選手の成績登録・編集
- 登録済み選手の成績一覧表示
    - 打率
    - 長打率
    - 出塁率
    - OPS
    - 打点
    - 安打数
    - 本塁打数
    - 盗塁数

打者の成績管理に特化した機能のみ実装されております。
投手成績については今後リリースの予定です。

## 使用言語・環境
- PHP
- Laravel

## 環境構築・利用手順

myplayersを利用するために、以下の手順で環境構築・利用準備を行ってください。

＜XAMPPのインストール＞
- 以下リンク先のApache Friendsにアクセス
    - https://www.apachefriends.org/jp/index.html
- 利用端末がWindowsなら『Windows向けXAMPP』、MACなら『OS X向けXAMPP』をダウンロード
- ダウンロードしたインストーラーを起動し、表示に従ってデフォルトのままインストール
- インストールしたXAMPPを起動し、『Apache』、『MySQL』のSTARTボタンを押下しApacheとMySQLを起動
- 『MySQL』のADMINボタンを押下し、『phpMyAdmin』が開くことを確認

＜データベースの作成＞
- phpMyAdminを開き、ホーム画面にて言語の設定を行う（初期は英語になっている）
    - 日本語に変更する場合『Appearance settings』にて『日本語 - Japanese』を選択
- 『新規作成』からデータベースを作成
    - 『***myplayers***』という名前でデータベースを作成

＜myplayersの利用＞
- 以下リポジトリからmyplayersをダウンロードし、『***C:\xampp\htdocs***』配下に配置
    - https://github.com/atneg-dev7/SeedTechSchool/tree/main/No4
- VSCodeで開き、`Ctrl + @`でコマンドラインを立ち上げた後、以下コマンドを流していく
    - `php artisan migrate` …作成したmyplayersデータベース内に必要なテーブルを作成
    - `php artisan serve` …http://localohost:8000にアクセスしLaravelの画面が表示されることを確認
- 『Register』を押下し必要項目を入力、ユーザー登録
- myplayersの利用開始

## 作成者
今井元太

## 今後のリリース計画
- 体裁修正
- 投手成績管理機能
- 各選手の写真を追加できるアルバム機能

