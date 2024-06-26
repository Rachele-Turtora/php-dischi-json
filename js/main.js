const { createApp } = Vue

createApp({
    data() {
        return {
            urlRecords: "http://localhost/php-dischi-json/server.php",
            records: [],
            currentRecord: null,
            newRecord: false,
            newRecordTitle: "",
            newRecordAuthor: "",
            newRecordYear: null
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
            this.currentRecord = null;
            const data = {
                "action": "create",
                "title": this.newRecordTitle,
                "author": this.newRecordAuthor,
                "year": this.newRecordYear
            }
            axios.post(this.urlRecords, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.records = response.data;
            })

            this.newRecord = false;
            this.newRecordTitle = "";
            this.newRecordAuthor = "";
            this.newRecordYear = null;
        },
        toggleNewRecord() {
            this.newRecord = !this.newRecord;
        },
        deleteRecord(id) {
            this.currentRecord = null; // serve per non far comparire div.record-info
            axios.get(this.urlRecords, {
                params: {
                    "action": "delete",
                    "id": id
                }
            }).then((response) => {
                this.records = response.data;
            })
        },
        exit() {
            this.currentRecord = null;
            this.newRecord = false;
        }
    },
    created() {
        this.getRecords();
    }
}).mount('#app')
