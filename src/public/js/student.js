// エラーメッセージの変数
const errMsgName = document.querySelector(".err-msg-name");
// console.log(errMsgName);

/**
 * ボタンを押したときに、各フォームのバリデーションを行い、
 * バリデーションに引っかかる場合は、内容を５秒間表示させる
 */
//

// ボタンの要素を取得
const button = document.querySelector("#button");
// 各フォームの要素を取得
const inputName = document.querySelector("#name");
const email = document.querySelector("#email");
const tel = document.querySelector("#tel");
const message = document.querySelector("#message");

// ボタンを押したときのイベントを取得
button.addEventListener("click", (e) => {
    let errMsg = [];
    errMsgName.innerHTML = "";

    // 各フォームの値が正しいか確認する
    // 共通条件
    // 空ではない。

    // 名前の入力確認
    if (inputName.value.length === 0) {
        errMsg.push("名前は、入力必須です");
    }

    /*メールアドレスのパターン 正規表現*/
    const pattern =
        /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/;
    // メールアドレスが正規表現とマッチすること
    if (pattern.test(email.value) !== true) {
        /*パターンにマッチしない場合*/
        errMsg.push("メールアドレスではありません");
    }

    // tel
    // 数字のみかどうか
    // 桁数チェック（１１桁まで）
    const regex = /^0\d{9,10}$/;
    if (regex.test(tel.value) !== true) {
        errMsg.push("電話番号ではありません");
    }

    // 30字以内であること
    if (message.value.length > 30) {
        // 30文字を超えたら、エラーメッセージを変数に代入
        errMsg.push("メッセージは30文字以内で入力してください");
    } else if (message.value.length === 0) {
        errMsg.push("メッセージは、入力必須です");
    }

    //　エラーメッセージがある場合
    if (errMsg.length !== 0) {
        // errMsg.lenghが1個以上あれば、メッセージを表示する
        errMsg.forEach(function (value) {
        // errMsg.forEach(function(value) {
        //     const msg = document.createElement("p");
        //     msg.textContent = value;
        // })
            const msg = document.createElement("p");
            msg.textContent = value;
            // msg.classList.add("append-content");
            errMsgName.appendChild(msg);
            e.preventDefault();
        });
        // エラーメッセージがない場合
    } else {
        // 全て正しい場合→送信の確認を表示する
        if (confirm("送信しますか？")) {
            // 送信オッケーの場合は送信する
            return true;
        } else {
            // 全部チェックが終わった際に、一つでもエラーがあれば、エラー文を表示させる

            // フォームの値が正しくない→変数に内容を代入
            e.preventDefault();
        }
    }

    // flashメッセージ要素を取得
    const fadeOutFlashMessage = (errMsgName) => {
        // setIntervalを特定するために返り値を変数timerIdに格納;
        const timerId = setInterval(() => {
            // flashメッセージのstyle属性 opacityを取得
            const opacity = errMsgName.style.opacity;

            if (opacity > 0) {
                // opacityの値が0より大きければ0.02ずつ値を減少させる
                errMsgName.style.opacity = opacity - 0.01;
            } else {
                // opacityの値が0になったら非表示に
                errMsgName.style.display = "none";
                // setIntervalをストップさせる
                clearInterval(timerId);
            }
        }, 50); // 今回は0.05秒ごとにsetIntervalを実行
    };

    errMsgName.style.display = "block";
    errMsgName.style.opacity = 1;
    setTimeout(fadeOutFlashMessage(errMsgName), 5000);
});


let textCounter = document.querySelector(".text-counter");
message.addEventListener("input", function (e) {
    textCounter.textContent = e.target.value.length;
});