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
                    <div class="card" v-for="record in records">
                        <h3>{{record.title}}</h3>
                        <p>{{record.author}}</p>
                        <h4>{{record.year}}</h4>
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