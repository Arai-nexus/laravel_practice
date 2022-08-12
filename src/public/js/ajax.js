// function getAllData() {
//     fetch('showAll', {//第一引数に送り先
//     })
//         .then(response => response.json())//返ってきたレスポンスをjsonで受け取って次のthenへ渡す
//         .then(res => {

//             res.forEach(elm => {
//                 let insertHTML = "<tr class=\"target\"><td>" + elm['id']
//                                     + "</td><td>" + elm['properties_name']
//                                     + "</td><td>" + elm['address']
//                                     + "</td><td>" + elm['building_age']
//                                     + "</td><td>" + elm['rent']
//                                     + "</td><tr>";
//                 let all_show_result = document.getElementById("all_show_result");
//                 all_show_result.insertAdjacentHTML('afterend', insertHTML);
//             })
//             console.log("通信成功");
//             console.log(res);//返ってきたデータ
//         })

//         .catch(error => {
//             console.log(error);
//         })
// }
// getAllData();

/**
 * $.post(url, params);
 */
$(function () {
    $("ajax-show").on("click"),
        function (e) {
            alert("success");
        };
});

const test = document.querySelector("#form");
console.log(test);

const params = ajax_show.addEventListener("click", (e) => {
    let postData = new FormData(test); // フォーム方式で送る場

    for (let val of postData.entries()) {
        console.log(val);
    }
    e.preventDefault();

    const parameter = {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        }, // CSRFトークン対策
        body: postData,
    };

    //url [, data] [, success] [, dataType]
    $.post("show-detail", parameter, function (data) {
        alert(data);
    });
});

/**
 * jsで取得
 */
// const test = document.querySelector("#form");
// console.log(test);

// const params = ajax_show.addEventListener("click", (e) => {
//     let postData = new FormData(test); // フォーム方式で送る場

//     for (let val of postData.entries()) {
//         console.log(val);
//     }
//     e.preventDefault();

//     $.postData("show-detail", {
//         // 第1引数に送り先
//         method: "POST",
//         headers: {
//             "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
//                 .content,
//         }, // CSRFトークン対策
//         body: postData,
//     })
//         .then((response) => {
//             console.log(response);
//             return response.json();
//         }) // 返ってきたレスポンスをjsonで受け取って次のthenへ渡す

//         //setTimeout
//         //resは、response.json()
//         //()はコールバック関数
//         .then((response) => {
//             let data = JSON.parse(response)[0]; // やりたい処理
//             const showResultArea = document.querySelector(".result");
//             showResultArea.classList.remove("display-none");
//             //取得してきた値
//             document.querySelector(".property-id > span").innerText = data.id;
//             document.querySelector(".property-name > span").innerText =
//                 data.properties_name;

//             const address = document.createElement("div");
//             address.textContent = "住所：" + data.address;
//             address.classList.add("append-content");
//             showResultArea.appendChild(address);

//             const buildingAge = document.createElement("div");
//             const rent = document.createElement("div");
//         })
//         .catch((error) => {
//             console.log(error); // エラー表示
//         });
// });

/**
 * HTML要素（見た目）
 * 入力フォームがあり、その下に詳細ボタンがある
 *
 * トリガー
 * 詳細ボタンを押したら
 *
 *  イベント
 * 詳細表示が一件表示される
 *
 * 具体的には
 * querySelectorでformに入力された値を取得し、パラメータに以下の項目を記載。
 * method　POSTメソッド
 * headers CSRF
 * body　  key：'id', value:"id"(値)
 * を持たせる
 *
 * 要するに
 * 詳細ボタンを押したら、パラメータにpost, CSRF対策、idのkeyとvalueを持たせて、json()で返す
 *
 */

/**fetchのhttpリクエストがpostメソッドの場合の仕様をまず把握してください。
    その仕様を見ればbodyに何を入れるか書いてると思うのでその仕様に合わせたデータを渡さないと
    いつまで経ってもサーバーにデータを送ることは出来ません。
*/
// ajax_show.addEventListener('click', () => {

//     console.log("イベント発火");

//     //フォームの入力内容からidの取得して、postDataに格納
//     let postData = document.querySelector('input[name=form-id]');
//     console.log(postData);
// const headers = {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content}
// //     //parameterにメソッドとCSRF対策、bodyを格納
//     const parameter = {
//         method: 'POST',
//         headers: {
//             headers: , // CSRFトークン対策
//         },
//         body: postData
//     }
//     console.log(parameter);

// //     //fetchに必要なものは？
// //     //送り先がおかしい？
//     fetch('/show-detail', parameter)
//         .then((response) => {
//             return response.json();
//     });

// const result = fetch("showDetail?id=" + $id, parameter)
// .then((response) => {
//     return response.json();
// });

// console.log(result);

// });

// public function hoge ($req Request){
//     ~
//     ~
//     ~
//     return 返したいjsonデータ
//    ----------------------------------------------------------------
//    Route：：post('url', [fugaController::class, 'hoge']);
//    ----------------------------------------------------------------
//    fetch("url",
//            {
//              method: "post"
//             body: postData
//            }).then((response) => {
//              return response.json();
//            }).then((data) => {
//              //dataをどうにかこうにかする処理
//            }).catch((error) => {
//              console.log(error);
