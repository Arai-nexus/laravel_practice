<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/welcome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>

<body>
    <main class="page">
        <div class="main-title">
            <p class="title">CONTACT</p>
            <p class="middle-title">問い合わせ</p>
            <p class="explain">物件に関するご質問など、お気軽に問い合わせください。</p>
        </div>
        <form name="contactForm" class="validationForm">
            <div class="Form">
                <p class="required">必須事項</p>
                <div class="Form-Item">
                    <div class="Form-Item-Label">氏名</div>
                    <div class="Form-Item">
                        <input type="text" class="Form-Item-Input" id="name" placeholder="Suzuki Taro">
                    </div>
                </div>
            </div>
            <div class="Form">
                <div class="Form-Item">
                    <div class="Form-Item-Label">メールアドレス</div>
                    <div class="Form-Item">
                        <input type="email" class="Form-Item-Input" id="email" placeholder="abcd@gmail.com">
                    </div>
                </div>
            </div>
            <div class="Form">
                <div class="Form-Item">
                    <div class="Form-Item-Label">電話番号</div>
                    <div class="Form-Item">
                        <input type="text" class="phone-input" id="tel" placeholder="+81 123 456 789">
                    </div>
                    {{-- <span class="phone-input"></span> --}}
                </div>
            </div>
            <div class="Form">
                <div class="Form-Item">
                    <div class="Form-Item-Label">物件名</div>
                    <div class="Form-Item">
                        <input type="text" class="Form-Item-Input" id="tel" placeholder="ご覧になっている物件名を入力してください">
                    </div>
                </div>
            </div>
            <div class="Form">
                <div class="Form-Item">
                    <div class="Form-Item-Label">お問い合わせ内容</div>
                    <div class="Form-Item">
                        {{-- inputのエリアに入ったときのみ発火 --}}
                        <textarea class="Form-Item-Textarea" id="area1" rows="30" placeholder="物件の詳細を教えてください。"></textarea>
                    </div>
                </div>
                <div id="strLen" class="right"><span class="text-counter">0</span>文字</div>
            </div>
            <button type="submit" class="Form-Btn">送信する</button>
        </form>
    </main>
    <script src="../js/index.js"></script>

</body>
