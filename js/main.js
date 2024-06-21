const { createApp } = Vue

createApp({
    data() {
        return {
            urlRecords: "http://localhost/php-dischi-json/server.php",
            records: [],
            currentRecord: null,
            newRecord: ""
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
                    "action": "read",
                    "id": id
                }
            }).then((response) => {
                this.currentRecord = response.data;
            })
        },
        createNewRecord() {
            const data = {
                "action": "create",
                "title": this.newRecord
            }
            axios.post(this.urlRecords, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.records = response.data;
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
