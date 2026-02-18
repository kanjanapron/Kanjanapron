<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>งานส่งอาจารย์ - กาญจนาภรณ์</title>
    <style>
        /* ตกแต่งพื้นหลังและฟอนต์ */
        body {
            font-family: 'Kanit', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        /* ตกแต่งข้อความหัวข้อ */
        h1 {
            color: #2c3e50;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        /* ส่วนของปุ่ม */
        .button-container {
            margin-bottom: 30px;
        }

        button {
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            margin: 0 10px;
            transition: transform 0.2s, box-shadow 0.2s;
            color: white;
        }

        button:active {
            transform: scale(0.95);
        }

        /* สีปุ่มตามโจทย์ */
        .btn-green {
            background-color: #2ecc71;
            box-shadow: 0 4px 15px rgba(46, 204, 113, 0.4);
        }

        .btn-orange {
            background-color: #e67e22;
            box-shadow: 0 4px 15px rgba(230, 126, 34, 0.4);
        }

        /* ส่วนแสดงรูปภาพ */
        #display-area {
            width: 300px;
            height: 350px;
            border: 5px solid white;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: #fff;
        }

        #display-area img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* ให้รูปพอดีกรอบ */
            display: none; /* ซ่อนไว้ก่อนในตอนแรก */
        }

        .placeholder-text {
            color: #95a5a6;
        }
    </style>
</head>
<body>

    <h1>งานk 66010914122 กาญจนาภรณ์ วินทะไชย</h1>

    <div class="button-container">
    <button class="btn-green" onclick="showImage('img/me.jpg')">รูปตัวเอง</button>
    <button class="btn-orange" onclick="showImage('img/11.jpg')">รูปอาจารย์</button>
</div>

    <div id="display-area">
        <p class="placeholder-text" id="status">กดปุ่มเพื่อดูรูปภาพ</p>
        <img id="main-img" src="" alt="แสดงรูปภาพ">
    </div>

    <script>
        function showImage(imageName) {
            const imgElement = document.getElementById('main-img');
            const statusText = document.getElementById('status');
            
            imgElement.src = imageName;
            imgElement.style.display = 'block';
            statusText.style.display = 'none';
        }
    </script>

</body>
</html>