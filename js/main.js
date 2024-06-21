const { createApp } = Vue

createApp({
    data() {
        return {
            urlRecords: "http://localhost/php-dischi-json/server.php",
            records: [],
            currentRecord: null
        }
    },
    methods: {
        getRecords() {
            axios.get(this.urlRecords).then((response) => {
                this.records = response.data;
            })
        },
        getRecordById(id) {
            axios.get(this.urlRecords, {
                params: {
                    "id": id
                }
            }).then((response) => {
                this.currentRecord = response.data;
                console.log(this.currentRecord);
            })
        },
        exit() {
            this.currentRecord = null;
        }
    },
    created() {
        this.getRecords();
    }
}).mount('#app')
