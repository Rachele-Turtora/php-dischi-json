const { createApp } = Vue

createApp({
    data() {
        return {
            urlRecords: "http://localhost/php-dischi-json/server.php",
            records: [],
            recordInfo: false,
            currentRecord: []
        }
    },
    methods: {
        getRecords() {
            axios.get(this.urlRecords).then((response) => {
                this.records = response.data;
            })
        },
        toggleInfo(record = null) {
            this.recordInfo = !this.recordInfo;
            if (record) {
                this.currentRecord = record;
            }
        }
    },
    created() {
        this.getRecords();
    }
}).mount('#app')
