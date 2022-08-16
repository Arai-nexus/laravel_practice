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
    // window.addEventListener("load", (e) => {
    //     // flash messageの要素を取得
    // });

    /**
     * 上記へ修正したので、確認。
     */
    // flashメッセージが空じゃなかったら（入っていたら）、処理を実行
    // if (flash_message !== null) {
    //     // style属性opacityをセット
    //     flash_message.style.opacity = 1;
    //     // 今回は表示から3秒後に上記で定義したフェードアウトさせる関数を実行
    //     setTimeout(fadeOutFlashMessage, 5000);
    //     }
    // });
});

//

// document.addEventListener("DOMContentLoaded", (e) => {
//     const button = document.querySelector("#button");
//     button.addEventListener("click", (e) => {
//         e.preventDefault();
//         const name = document.querySelector("#name");

//         // エラーメッセージを表示させる要素を取得
//         if (!name.value) {
//             // クラスを追加(エラーメッセージを表示する)
//             // errMsgName.classList.add("form-invalid");
//             // エラーメッセージのテキスト
//             errMsgName.textContent = "お名前が入力されていません";
//             // クラスを追加(フォームの枠線を赤くする)
//             // name.classList.add("input-invalid");
//             // 後続の処理を止める
//             return;
//         } else {
//             // エラーメッセージのテキストに空文字を代入
//             errMsgName.textContent = "";
//             // クラスを削除
//             // name.classList.remove("input-invalid");
//         }
//     });

// /*各画面オブジェクト*/
// const input_name = document.getElementById("name");
// const email = document.getElementById("email");
// const tel = document.getElementById("tel");
// const message = document.getElementById("message");
// const reg =
//     /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$/;
// if (input_name.value == null) {
//     message.push("氏名が未入力です。");
//     console.log;
// }
//   if(form) {
//     const errorClassName = 'error';
//     let message = [];
//     /*入力値チェック*/
//     if (input_name.value == null) {
//         message.push("氏名が未入力です。");
//     }
//     if (email.value == null) {
//         message.push("年齢が未入力です。");
//     }
//     if (tel.value == null) {
//         message.push("メールアドレスが未入力です。");
//     } else if (!reg.test(inputMail.value)) {
//         message.push("メールアドレスの形式が不正です。");
//     }
//     if (message.value) {
//         message.push("利用規約に同意してください。");
//     }
//     if (message.length > 0) {
//         alert(message);
//         return;
//     }
//     alert("入力チェックOK");
// });
// });

// // ボックスを表示して、タイマーを開始
// function showBox() {
//     document.getElementById("temporaryBox").style.display = "block"; // ボックスを表示
//     timerId = setTimeout(closeBox, 5000); // タイマーを開始
//     document.getElementById("btnShowBox").disabled = true; // 表示用ボタンを無効化
// }

// // ボックスを消して、タイマーを終了
// function closeBox() {
//     document.getElementById("temporaryBox").style.display = "none"; // ボックスを消す
//     clearTimeout(timerId); // タイマーを終了
// }

// // タイマーだけを中止
// function keepBox() {
//     clearTimeout(timerId); // タイマーを終了
//     document.getElementById("btnKeepBox").disabled = true; // 維持用ボタンを無効化
// }

// const contactForm = document.querySelector("#area1");
// let textCounter = document.querySelector(".text-counter");

// contactForm.addEventListener("input", function (e) {
//     textCounter.textContent = e.target.value.length;
// });

// console.log(".text-content");
// console.log(textCounter.textContent);

// const phoneNumber = document.querySelector("#tel");
// const phoneValidation = document.querySelector(".phone-input");
// const validationPattern = /^[0-9]{10}$/;

// phoneNumber.addEventListener("input", function (e) {
//     if (validationPattern.test(phoneNumber.value) !== true) {
//         alert("電話番号フォームではありません。");
//         phoneValidation.style.backgroundColor = "pink";
//     }
// });

// phoneNumber.addEventListener("input", function (e) {
//     onreset;
// });

// let flash_message = document.getElementById("flash_message");
// window.addEventListener("load", function () {
//       flash_message.classList.add('fadeout');
//       setTimeout(function(){
//         text.style.display = "none";
//       }, 1000);
//     }, false);
// });

// window.addEventListener("load", function() {
//     setTimeout(('.alert-success').fadeOut() }, 5000);
//  });
