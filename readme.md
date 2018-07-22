# myblog

自作アプリの練習兼自分の技術ブログも欲しいという理由。
Laravel - API
Vue.js - フロント
のSPAで構築中。

## 概要

- ログイン機能(Vue.js側で実装)
- API認証(ログイン時に取得したJWTトークンを使用した場合のみAPIを叩けるように実装)
- Markdownを使用しての記事編集機能(EditorをSimpleMDE、パーサーをMarkedで実装)
- SPA(APIをLaravel、Vue.jsでAPIを叩いて(Axios)データ取得、画面遷移はVue-Routerで制御、Component間のデータ受け渡しをVuexで実装)

## 環境、言語、ライブラリ

- Vagrant
- CentOS7.4
- Apache2.4
- MySQL5.6
- PHP7.2
- Laravel5.6
- Vue.js
- Vue Router
- Vuex
- Axios
- Bootstrap4
- SimpleMDE
- Marked
