<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Records</title>
</head>

<body>
    <div id="app" v-cloak>
        <header>
            <div class="logo">
                <img src="./img/logo.jpg" alt="logo">
            </div>
            <button @click="toggleNewRecord()">Create</button>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="card" v-for="record in records" @click="getRecordById(record.id)">
                        <div class="img-card">
                            <img :src="record.img" alt="">
                        </div>
                        <h3>{{record.title}}</h3>
                        <p>{{record.author}}</p>
                        <h4>{{record.year}}</h4>
                    </div>
                </div>
            </div>
            <div v-if="currentRecord" class="record-info">
                <div class="container-info">
                    <button class="exit" @click="exit()">x</button>
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
            <div v-if="newRecord" class="new-record">
                <div class="container-new-record">
                    <button class="exit" @click="exit()">x</button>
                    <h3>Add new record</h3>
                    <form action="" @submit.prevent="createNewRecord()">
                        <div class="new-record-input">
                            <label for="record-title">Titolo:</label>
                            <input type="text" id="record-title" v-model="newRecordTitle">
                        </div>
                        <div class="new-record-input">
                            <label for="record-title">Autore:</label>
                            <input type="text" id="record-title" v-model="newRecordAuthor">
                        </div>
                        <div class="new-record-input">
                            <label for="record-title">Anno:</label>
                            <input type="text" id="record-title" v-model="newRecordYear">
                        </div>
                        <button class="add">Add</button>
                    </form>
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