const { createApp } = Vue

createApp({
    data() {
        return {
            urlRecords: "http://localhost/php-dischi-json/server.php",
            records: []
        }
    },
    methods: {
        getRecords() {
            axios.get(this.urlRecords).then((response) => {
                this.records = response.data;
            })
        }
    },
    created() {
        this.getRecords();
    }
}).mount('#app')
