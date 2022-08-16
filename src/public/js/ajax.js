//　エラーメッセージがある場合
if (errMsg.length !== 0) {
    // errMsg.lenghが1個以上あれば、メッセージを表示する
    errMsg.forEach(function (value) {
        const msg = document.createElement("p");
        msg.textContent = value;
        // msg.classList.add("append-content");
        errMsgName.appendChild(msg);
        e.preventDefault();
    });

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

/**
 * jsで取得
 */
const test = document.querySelector("#form");
console.log(test);

const params = ajax_show.addEventListener("click", (e) => {
    let postData = new FormData(test); // フォーム方式で送る場

    for (let val of postData.entries()) {
        console.log(val);
    }
    e.preventDefault();

    $.postData("show-detail", {
        // 第1引数に送り先
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        }, // CSRFトークン対策
        body: postData,
    })
        .then((response) => {
            console.log(response);
            return response.json();
        }) // 返ってきたレスポンスをjsonで受け取って次のthenへ渡す

        //setTimeout
        //resは、response.json()
        //()はコールバック関数
        .then((response) => {
            let data = JSON.parse(response)[0]; // やりたい処理
            const showResultArea = document.querySelector(".result");
            showResultArea.classList.remove("display-none");
            //取得してきた値
            document.querySelector(".property-id > span").innerText = data.id;
            document.querySelector(".property-name > span").innerText =
                data.properties_name;

            const address = document.createElement("div");
            address.textContent = "住所：" + data.address;
            address.classList.add("append-content");
            showResultArea.appendChild(address);

            const buildingAge = document.createElement("div");
            const rent = document.createElement("div");
        })
        .catch((error) => {
            console.log(error); // エラー表示
        });
});
