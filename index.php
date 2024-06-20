<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>

<body>
    <div id="app" v-cloak>
        <header>
            <div class="logo">
                <img src="./img/logo.jpg" alt="logo">
            </div>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="card" v-for="record in records" @click="toggleInfo(record)">
                        <div class="img-card">
                            <img :src="record.img" alt="">
                        </div>
                        <h3>{{record.title}}</h3>
                        <p>{{record.author}}</p>
                        <h4>{{record.year}}</h4>
                    </div>
                </div>
            </div>
            <div class="record-info" :class="{display: recordInfo}">
                <div class="container-info">
                    <button class="exit" @click="toggleInfo()">x</button>
                    <div class="card-info">
                        <div class="img-card-info">
                            <img :src="currentRecord.img" alt="">
                        </div>
                        <h2>{{currentRecord.title}}</h2>
                        <p>{{currentRecord.author}}</p>
                        <h3>{{currentRecord.year}}</h3>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Vue.js -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>